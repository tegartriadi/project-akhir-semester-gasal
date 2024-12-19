<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
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
        $this->db->from('peminjaman a')->order_by('a.tanggalPeminjaman', 'DESC');
        $this->db->join('buku b', 'a.bukuID=b.bukuID', 'left');
        $this->db->where('userID', $this->session->userdata('userID'));
        $buku = $this->db->get()->result_array();
        $data = array(
            'judul'     => 'Riwayat Peminjaman',
            'buku'      => $buku,
           
        );
        $this->template->load('template', 'peminjam/riwayat', $data);
    }

    public function batal($peminjamanID) {
        $data = array(
            'statusPeminjaman' => 'Dibatalkan',
        );
        $where = array(
            'peminjamanID'    => $peminjamanID,
        );
        
        $this->db->update('peminjaman', $data, $where);
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success alert-dismissible" role="alert">
                Berhasil membatalkan peminjaman buku!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
  redirect('index.php/peminjam/peminjaman');
    }
}