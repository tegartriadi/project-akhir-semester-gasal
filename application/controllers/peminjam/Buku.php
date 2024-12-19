<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
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
        $this->template->load('template', 'peminjam/buku', $data);
    }

    public function ajukan($bukuID) {
        $this->db->from('buku a')->where('a.bukuID', $bukuID);
        $this->db->join('kategori b', 'a.kategoriID=b.kategoriID', 'left');
        $buku = $this->db->get()->row();
        $data = array(
            'judul'     => 'Halaman Peminjaman Buku',
            'buku'      => $buku,
          
        );
        $this->template->load('template', 'peminjam/ajukan', $data);
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
        $this->template->load('template', 'peminjam/ulasan', $data);
    }

    public function pinjam() {
         $this->db->from('peminjaman')
                  ->where('bukuID', $this->input->post('bukuID'))
                  ->where('statusPeminjaman','Proses');
         $cek = $this->db->get()->row();
         if ($cek == NULL) {
            $data = array(
                'bukuID'    => $this->input->post('bukuID'),
                'userID'    => $this->session->userdata('userID'),
                'tanggalPeminjaman' => $this->input->post('tanggalPeminjaman'),
                'statusPeminjaman'      =>  'Proses',
               
            );

            // Set notifikasi sukses
            $this->db->insert('peminjaman', $data);
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Berhasil mengajukan peminjaman silahkan tunggu konfirmasi dari admin!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/peminjam/buku');
        }else{
            $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success alert-dismissible" role="alert">
                Anda Sudah mengajukan peminjaman atau sudah ada yang mengajukan peminjaman buku oleh orang lain, silahkan tunggu konfirmasi dari admin!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('index.php/peminjam/buku');
        }
}
public function addKoleksi($bukuID){
    $this->db->from('koleksiPribadi')
                  ->where('bukuID', $bukuID)
                  ->where('userID',$this->session->userdata('userID'));
         $cek = $this->db->get()->row();
         if ($cek == NULL) { 
    $data = array(
       'bukuID'    => $bukuID,
       'userID'    => $this->session->userdata('userID'),
    );
   // Set notifikasi sukses
   $this->db->insert('koleksiPribadi', $data);
   $this->session->set_flashdata('notifikasi', 
       '<div class="alert alert-success alert-dismissible" role="alert">
           Berhasil menambahkan ke koleksi buku!
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>'
   );
   redirect('index.php/peminjam/buku');
}else{
    $this->session->set_flashdata('notifikasi', 
    '<div class="alert alert-success alert-dismissible" role="alert">
        Anda sebelumnya sudah menambahkannya ke koleksi!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
);
redirect('index.php/peminjam/buku');
}

}

    public function submitUlasan(){
        $data = array(
            'bukuID'    => $this->input->post('bukuID'),
            'userID'    => $this->session->userdata('userID'),
            'ulasan' => $this->input->post('ulasan'),
            'rating' => $this->input->post('rating'),
           
        );

        // Set notifikasi sukses
        $this->db->insert('ulasanBuku', $data);
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success alert-dismissible" role="alert">
                Berhasil menambahkan ulasan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('index.php/peminjam/buku');
    }

    public function ulasanHapus($bukuID) {
        $where = array(
            'bukuID' => $bukuID,
            'userID' => $this->session->userdata('userID'),
        );
        $this->db->delete('ulasanBuku', $where);
        // Set notifikasi penghapusan
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-danger alert-dismissible" role="alert">
                Ulasan berhasil dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('index.php/peminjam/buku/ulasan/'.$bukuID);
    }
}