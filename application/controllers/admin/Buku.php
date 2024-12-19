<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_login') == FALSE){
            redirect('index.php/auth');
        }
        if($this->session->userdata('role') == 'Peminjam'){
            redirect('index.php/home');
        }
    }

    public function index() {
        $this->db->from('buku a')->order_by('a.judul', 'ASC');
        $this->db->join('kategori b', 'a.kategoriID=b.kategoriID', 'left');
        $buku = $this->db->get()->result_array();
        $this->db->from('kategori')->order_by('namaKategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul'     => 'Halaman Buku',
            'buku'      => $buku,
            'kategori'  => $kategori,
        );
        $this->template->load('template', 'admin/buku_index', $data);
    }

    public function edit($bukuID) {
        if($this->session->userdata('role') == 'Petugas'){
            redirect('index.php/home');
        }
        $this->db->from('buku')->where('bukuID', $bukuID);
        $buku = $this->db->get()->row();
        $this->db->from('kategori')->order_by('namaKategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul'     => 'Edit Buku',
            'buku'      => $buku,
            'kategori'  => $kategori,
        );
        $this->template->load('template', 'admin/buku_edit', $data);
    }

    public function simpan() {
        // Konfigurasi upload file
        $config = [
            'upload_path' => './assets/upload/buku/',
            'allowed_types' => '*',
            'max_size' => 5000, // Max size dalam KB
            'file_name' => date('YmdHis'), // Nama file tanpa ekstensi
        ];
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ' . $this->upload->display_errors() . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('index.php/admin/buku');
        } else {
            $upload_data = $this->upload->data(); // Ambil data file
            $namafoto = $upload_data['file_name']; // Nama file lengkap dengan ekstensi
        }

        // Cek apakah judul buku sudah ada
        $this->db->from('buku')->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->row();

        if ($cek == NULL) {
            // Data baru
            $data = array(
                
                'judul'         => $this->input->post('judul'),
                'penulis'       => $this->input->post('penulis'),
                'penerbit'      => $this->input->post('penerbit'),
                'tahunTerbit'   => $this->input->post('tahunTerbit'),
                'stok'          => $this->input->post('stok'),
                'sinopsis'      => $this->input->post('sinopsis'),
                'foto'          => $namafoto,
                'kategoriID'    => $this->input->post('kategoriID'),
                'status'        => 'Tersedia',
            );

            // Menyimpan data buku
            $this->db->insert('buku', $data);

            // Set notifikasi sukses
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Berhasil menyimpan data!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/admin/buku');
        } else {
            // Set notifikasi gagal
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    Gagal menyimpan data! Judul sudah ada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/admin/buku');
        }
    }

    public function update() {
        // Cek apakah ada foto baru yang diupload
        $foto = $this->input->post('foto_lama');
        if ($_FILES['foto']['name']) {
            // Konfigurasi upload file
            $config = [
                'upload_path' => './assets/upload/buku/',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => 5000, // Max size dalam KB
                'file_name' => date('YmdHis'), // Nama file tanpa ekstensi
            ];
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ' . $this->upload->display_errors() . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ');
                redirect('index.php/admin/buku/edit/'.$this->input->post('bukuID'));
            } else {
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name']; // Nama file baru
            }
        }

        // Data yang akan diupdate
        $data = array(
                'judul'         => $this->input->post('judul'),
                'penulis'       => $this->input->post('penulis'),
                'penerbit'      => $this->input->post('penerbit'),
                'sinopsis'      => $this->input->post('sinopsis'),
                'tahunTerbit'   => $this->input->post('tahunTerbit'),
                'stok'          => $this->input->post('stok'),
                'kategoriID'    => $this->input->post('kategoriID'),
                'foto'          => $foto, // Menyimpan foto baru jika ada
        );

        $where = array(
            'bukuID' => $this->input->post('bukuID'),
        );

        // Update data buku
        $this->db->update('buku', $data, $where);

        // Set notifikasi sukses
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success alert-dismissible" role="alert">
                Berhasil memperbarui data!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('index.php/admin/buku');
    }

    public function delete($bukuID) {
        if($this->session->userdata('role') == 'Petugas'){
            redirect('index.php/home');
        }
        $foto = $this->db->select('foto')->get_where('buku', ['bukuID' => $bukuID])->row('foto');
    
        // Hapus file foto jika ada
        if ($foto && file_exists(FCPATH . 'assets/upload/buku/' . $foto)) {
            unlink(FCPATH . 'assets/upload/buku/' . $foto);
        }
        // Menghapus buku berdasarkan ID
        $this->db->where('bukuID', $bukuID);
        $this->db->delete('buku');

        // Set notifikasi penghapusan
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-danger alert-dismissible" role="alert">
                Data berhasil dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('index.php/admin/buku');
    }
    public function ulasan($bukuID) {
        $this->db->from('buku')->where('bukuID', $bukuID);
        $buku = $this->db->get()->row();
        $this->db->from('ulasanBuku a');
        $this->db->join('user b', 'a.userID=b.userID', 'left');
        $this->db->where('a.bukuID', $bukuID);
        $ulasan = $this->db->get()->result_array();
        $data = array(
            'judul'     => 'Ulasan Buku',
            'buku'      => $buku,
            'ulasan'      => $ulasan,
        );
        $this->template->load('template', 'admin/ulasan', $data);
    }
}
