<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->model('Msignup');
	}

	public function index(){
		$this->load->view('signup');
	}

    public function daftar(){
		$username = $this->input->post('daftar_username');
		$password = $this->input->post('daftar_password');
        

        $data = array(
            "username" => $this->input->post('daftar_username'),
            "password" => md5($this->input->post('daftar_password')),
        );

        if ($this->Msignup->get_count(array('username' => $username)) > 0) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger">Username yang dimasukkan sudah dipakai!</div>');
			redirect("signup?pesan=gagal");
        }

        else {

            $this->db->insert('admin', $data);
            
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Akun Berhasil Dibuat!</div>');
			redirect("signup?pesan=berhasil");
        }

    }

}