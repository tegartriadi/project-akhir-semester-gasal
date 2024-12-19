<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')==FALSE){
			redirect('index.php/auth');
		}
        if($this->session->userdata('role') == 'Peminjam'){
            redirect('index.php/home');
        }
        if($this->session->userdata('role') == 'Petugas'){
            redirect('index.php/home');
        }
	}
    public function index() {
        $this->db->from('kategori');
        $this->db->order_by('namaKategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul' => 'Halaman Kategori',
            'kategori'  => $kategori
        );
        $this->template->load('template', 'admin/kategori_index', $data);
    }

    public function edit($kategoriID) {
        $this->db->from('kategori');
        $this->db->where('kategoriID', $kategoriID);
        $kategori = $this->db->get()->row();
        $data = array(
            'judul' => 'Edit Kategori',
            'kategori'  => $kategori
        );
        $this->template->load('template', 'admin/kategori_edit', $data);
    }

    public function simpan() {
        // Cek apakah nama kategori sudah ada
        $this->db->from('kategori')->where('namaKategori', $this->input->post('namaKategori'));
        $cek = $this->db->get()->row();

        if ($cek == NULL) {
            // Data baru
            $data = array(
                'namaKategori' => $this->input->post('namaKategori'),

            );

            // Set notifikasi sukses
            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Berhasil menyimpan data!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
      redirect('index.php/admin/kategori');
        } else {
            // Set notifikasi gagal
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    Gagal menyimpan data! nama kategori sudah ada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }
  redirect('index.php/admin/kategori');
    }

    public function update() {
            $data = array(
                'namaKategori' => $this->input->post('namaKategori'),
                
            );

            $where = array(
                'kategoriID'    => $this->input->post('kategoriID'),
            );
            
            $this->db->update('kategori', $data, $where);
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Berhasil memperbarui data!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
      redirect('index.php/admin/kategori');
        }
    
        public function delete($kategoriID) {
            $this->db->where('kategoriID', $kategoriID);
            $this->db->delete('kategori');

            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Data berhasil dihapus!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );

      redirect('index.php/admin/kategori');
        }
}

