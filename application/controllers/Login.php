<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function index(){
		$this->load->view('v_login2');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'badge' => $username,
			'pass' => md5($password)
			);
		$datak= $this->m_aplikasi->detail_data("karyawan",$where)->result();
		foreach($datak as $k){ 
			$nama = $k->nama;
			$position = $k->position;
			$poslev = $k->poslev;
		}
		$cek = $this->m_aplikasi->cek_login("karyawan",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'badge' => $username,
				'nama' => $nama,
				'position' => $position,
				'poslev' => $poslev,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("dashboard"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}