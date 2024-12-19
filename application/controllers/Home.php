<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_login')==FALSE){
            redirect('index.php/auth');
        }
        if($this->session->userdata('role')=='Peminjam'){
            redirect('index.php/peminjam/dashboard');
        }
    }

    public function index()
    {
        $data = array(
            'judul'     => 'Dashboard',
        );
        $today = date('Y-m-d');
        $this->db->where('DATE(tanggalPeminjaman)', $today);
        $query_today = $this->db->get('peminjaman');
        $jumlah_peminjaman_today = $query_today->num_rows();

        // Query untuk mengambil data peminjaman dalam periode tertentu untuk chart
        $this->db->select('DATE(tanggalPeminjaman) as date, COUNT(*) as total');
        $this->db->group_by('DATE(tanggalPeminjaman)');
        $query = $this->db->get('peminjaman');


        $data['jumlah_peminjaman_today'] = $jumlah_peminjaman_today;
        $data['chart_data'] = $query->result_array();
        $this->template->load('template','dashboard', $data);
    }
    
}