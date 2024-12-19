<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
        $this->db->from('user');
        $this->db->order_by('namaLengkap', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul' => 'Halaman User',
            'user'  => $user
        );
        $this->template->load('template', 'admin/user_index', $data);
    }

    public function edit($userID) {
        $this->db->from('user');
        $this->db->where('userID', $userID);
        $user = $this->db->get()->row();
        $data = array(
            'judul' => 'Edit User',
            'user'  => $user
        );
        $this->template->load('template', 'admin/user_edit', $data);
    }

    public function simpan() {
        // Cek apakah username sudah ada
        $this->db->from('user')->where('username', $this->input->post('username'));
        $cek = $this->db->get()->row();

        if ($cek == NULL) {
            // Data baru
            $data = array(
                'username'    => $this->input->post('username'),
                'password'    => md5($this->input->post('password')),
                'namaLengkap' => $this->input->post('namaLengkap'),
                'alamat'      => $this->input->post('alamat'),
                'email'       => $this->input->post('email'),
                'role'        => $this->input->post('role')
            );

            // Set notifikasi sukses
            $this->db->insert('user', $data);
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Berhasil menyimpan data!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/admin/user');
        } else {
            // Set notifikasi gagal
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    Gagal menyimpan data! Username sudah ada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }
        redirect('index.php/admin/user');
    }

    public function update() {
            $data = array(
                'namaLengkap' => $this->input->post('namaLengkap'),
                'alamat'      => $this->input->post('alamat'),
                'email'       => $this->input->post('email'),
            );

            $where = array(
                'userID'    => $this->input->post('userID'),
            );
            
            $this->db->update('user', $data, $where);
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Berhasil memperbarui data!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/admin/user');
        }
    
        public function delete($userID) {
            $this->db->where('userID', $userID);
            $this->db->delete('user');

            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Data berhasil dihapus!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );

            redirect('index.php/admin/user');
        }
}

