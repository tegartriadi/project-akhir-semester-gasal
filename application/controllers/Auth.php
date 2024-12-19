<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
        $data = array(
            'judul'     => 'Halaman Login',
        );
		$this->load->view('login', $data);
	}

    public function register(){
        $data = array(
            'judul' => 'Halaman Register',
        );
        $this->load->view('register', $data);
    }
    

    public function logout(){
        $this->session->sess_destroy();
        redirect('index.php/auth');
    }

    public function profile() {
        $this->db->from('user');
        $this->db->where('userID', $this->session->userdata('userID'));
        $user = $this->db->get()->row();
        $data = array(
            'judul' => 'My Profile',
            'user'  => $user
        );
        $this->template->load('template', 'profile', $data);
    }

    public function password() {
        $data = array(
            'judul' => 'Ganti Password',
        );
        $this->template->load('template', 'password', $data);
    }

    public function updatePassword(){
        $username = $this->session->userdata('username');
        $passwordBaru = $this->input->post('passwordBaru');
        $konfirmasiPassword = $this->input->post('konfirmasiPassword');

        $this->db->from('user')->where('username', $username);
        $passwordDatabase = $this->db->get()->row()->password;
        if($passwordBaru<>$konfirmasiPassword){
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                   Konfirmasi Password Tidak Sama!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/auth/password');
        } else{
            
            $data = array(
                'password'        => md5($passwordBaru),
            );

            $where = array(
                'username'      => $username,
            );
            $this->db->update('user', $data, $where);
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                   Berhasil Mengganti Password!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/auth/password');
    }
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
        redirect('index.php/auth/profile');
    }
    

    public function login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user')->where('username', $username);
        $data = $this->db->get()->row();
        if($data==NULL){
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    Username Tidak Ditemukan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/auth');
        } else if($data->password==$password){
            $data = array(
                'is_login'     => TRUE,
                'username'    => $data->username,
                'userID'    => $data->userID,
                'namaLengkap' => $data->namaLengkap,
                'alamat'      => $data->alamat,
                'email'       => $data->email,
                'role'        => $data->role,
            );
            $this->session->set_userdata($data);
            redirect('index.php/home');
        }else{
            $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-danger alert-dismissible" role="alert">
                Password salah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('index.php/auth');
        }
    }
    public function simpan() {
        $this->db->from('user')->where('username', $this->input->post('username'));
        $cek = $this->db->get()->row();

        if ($cek == NULL) {
            $data = array(
                'username'    => $this->input->post('username'),
                'password'    => md5($this->input->post('password')),
                'namaLengkap' => $this->input->post('namaLengkap'),
                'alamat'      => $this->input->post('alamat'),
                'email'       => $this->input->post('email'),
                'role'        => 'Peminjam'
            );

            // Set notifikasi sukses
            $this->db->insert('user', $data);
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    Berhasil register silahkan login!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('index.php/auth');
        } else {
            // Set notifikasi gagal
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    Username sudah ada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }
        redirect('index.php/auth/register');
    }

	
}
