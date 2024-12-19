<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_login') == FALSE){
            redirect('index.php/auth');
        }
        if($this->session->userdata('role') == 'Admin'){
            redirect('index.php/home');
        }
        if($this->session->userdata('role') == 'Petugas'){
            redirect('index.php/home');
        }
    }

    public function index() {
        $this->db->from('koleksiPribadi a')
                 ->join('buku b', 'a.bukuID=b.bukuID', 'left')
                 ->join('kategori c', 'b.kategoriID=c.kategoriID', 'left')
                 ->where('a.userID', $this->session->userdata('userID'));
        $buku = $this->db->get()->result_array();
        $data = array(
            'judul'     => 'Halaman Buku',
            'buku'      => $buku,
        );
        $this->template->load('template', 'peminjam/koleksi', $data);
    }

    public function delete($bukuID) {
        $foto = $this->db->select('foto')->get_where('buku', ['bukuID' => $bukuID])->row('foto');
    
        // Hapus file foto jika ada
        if ($foto && file_exists(FCPATH . 'assets/upload/buku/' . $foto)) {
            unlink(FCPATH . 'assets/upload/buku/' . $foto);
        }
        $where = array(
            'bukuID'        => $bukuID,
            'userID'        => $this->session->userdata('userID'),
        );
        $this->db->delete('koleksiPribadi', $where);

        // Set notifikasi penghapusan
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-danger alert-dismissible" role="alert">
                Berhasil menghapus koleksi!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('index.php/peminjam/koleksi');
    }

}