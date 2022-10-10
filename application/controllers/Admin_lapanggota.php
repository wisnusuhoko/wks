<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_lapanggota extends CI_Controller{

	function index(){
	$data['title'] = "Laporan Data Anggota";
	$data['main'] = "vlap_anggota";
	$data['anggota'] = $this->m_aplikasi->tampil_data('anggota')->result();
	$this->load->view('template',$data);

	}
	
}