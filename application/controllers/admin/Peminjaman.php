<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
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
        $this->db->from('peminjaman a')
        ->join('buku b', 'a.bukuID = b.bukuID', 'left') // Join tabel buku
        ->join('user c', 'a.userID = c.userID', 'left') // Join tabel user
        ->order_by('a.tanggalPeminjaman', 'DESC') // Urut berdasarkan tanggal peminjaman
        ->order_by('a.peminjamanID', 'DESC'); // Urut berdasarkan ID peminjaman

        $buku = $this->db->get()->result_array(); // Eksekusi query dan ambil data sebagai array
        $data = array(
            'judul'     => 'Data Peminjaman',
            'buku'      => $buku,
           
        );
        $this->template->load('template', 'admin/peminjaman', $data);
    }

    public function laporan() {
        $tanggal1 = $this->input->get('tanggal1');
        $tanggal2 = $this->input->get('tanggal2');
        $status = $this->input->get('status');

        // Start building the query
        $this->db->from('peminjaman a')
            ->join('buku b', 'a.bukuID = b.bukuID', 'left') // Join tabel buku
            ->join('user c', 'a.userID = c.userID', 'left') // Join tabel user
            ->order_by('a.tanggalPeminjaman', 'DESC') // Urut berdasarkan tanggal peminjaman
            ->order_by('a.peminjamanID', 'DESC'); // Urut berdasarkan ID peminjaman

        // Add date filters if provided
        if (!empty($tanggal1) && !empty($tanggal2)) {
            $this->db->where('a.tanggalPeminjaman >=', $tanggal1);
            $this->db->where('a.tanggalPeminjaman <=', $tanggal2);
        }

        // Add status filter if it's not '-'
        if ($status !== '-') {
            $this->db->where('a.statusPeminjaman', $status);
        }

        // Execute the query
        $buku = $this->db->get()->result_array();

        // Prepare data for the view
        $data = array(
            'judul' => 'Laporan Peminjaman',
            'buku'  => $buku,
        );

        // Load the laporan view
        $this->load->view('admin/laporan', $data);
    }

    public function tolak($peminjamanID) {
        $data = array(
            'statusPeminjaman' => 'Ditolak',
        );
        $where = array(
            'peminjamanID'    => $peminjamanID,
        );
        
        $this->db->update('peminjaman', $data, $where);
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success alert-dismissible" role="alert">
                Anda telah menolak peminjaman buku!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
  redirect('index.php/admin/peminjaman');
    }

    public function terima($peminjamanID, $bukuID) {
        $data = array(  'statusPeminjaman' => 'Dipinjam');
        $where = array('peminjamanID'    => $peminjamanID);
        $this->db->update('peminjaman', $data, $where);

        $data = array(  'status' => 'Dipinjam');
        $where = array('bukuID'    => $bukuID);
        $this->db->update('buku', $data, $where);


        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success alert-dismissible" role="alert">
                Anda telah menolak peminjaman buku!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
  redirect('index.php/admin/peminjaman');
    }

    public function kembali($peminjamanID, $bukuID) {
        $data = array(
            'statusPeminjaman' => 'Sudah Dikembalikan',
            'tanggalPengembalian' => date('Y-m-d'),
        );
        $where = array('peminjamanID'    => $peminjamanID);
        $this->db->update('peminjaman', $data, $where);

        $data = array(  'status' => 'Tersedia');
        $where = array('bukuID'    => $bukuID);
        $this->db->update('buku', $data, $where);


        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success alert-dismissible" role="alert">
                Anda telah mengembalikan peminjaman buku!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
  redirect('index.php/admin/peminjaman');
    }
}