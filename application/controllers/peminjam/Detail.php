<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')==FALSE){
			redirect('index.php/auth');
		}
		if($this->session->userdata('role') == 'Petugas'){
            redirect('index.php/home');
        }
		if($this->session->userdata('role') == 'Admin'){
            redirect('index.php/home');
        }
	}

	public function index()
	{
		$this->db->from('buku a');
		$this->db->join('kategori b','a.kategoriID=b.kategoriID','left');
		$detail = $this->db->get()->row();
		
        $data = array(
            'judul'     => 'Detail Buku',
			'detail'		=> $detail,
        );
		
		$this->load->view('peminjam/detail', $data);
	}
	
}


