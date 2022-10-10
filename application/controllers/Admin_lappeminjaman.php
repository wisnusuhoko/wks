<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_lappeminjaman extends CI_Controller{

	function index(){
	$data['title'] = "Laporan Data Peminjaman";
	$data['main'] = "vlap_peminjaman";
	$data['peminjaman'] = $this->m_aplikasi->tampil_join3('peminjaman','anggota','buku','id_anggota','kode_buku','idpeminjaman','DESC')->result();
	$this->load->view('template',$data);

	}
	
}