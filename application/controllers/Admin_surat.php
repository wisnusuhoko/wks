<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_surat extends CI_Controller{

	function index(){
	$data['menu'] = "surat";
	$data['title'] = "Daftar Surat";
	$data['main'] = "v_daftar_surat";
	$data['surat'] = $this->m_aplikasi->tampil_data('surat')->result();
	$this->load->view('header',$data);
	}

	function detail_surat($id_surat){
	$where = array('id_surat' => $id_surat);
	$data['surat'] = $this->m_aplikasi->detail_data("surat",$where)->result();
	$data['menu'] = "surat";
	$data['title'] = "Detail Surat";
	$data['main'] = "v_detail_surat";
	$this->load->view('header',$data);
	}

	function print_surat($id_surat){
	$where = array('id_surat' => $id_surat);
	$data['surat'] = $this->m_aplikasi->detail_data("surat",$where)->result();
	$this->load->view('v_print_surat',$data);
	}

	function tambah(){
	if(isset($_POST['submit'])){	
	
		$id_surat = $this->input->post('id_surat');
		$nomer_surat = $this->input->post('nomer_surat');
		$judul_surat = $this->input->post('judul_surat');
		$isi_surat = $this->input->post('isi_surat');
 
		$data = array(
			'id_surat' => $id_surat,
			'nomer_surat' => $nomer_surat,
			'judul_surat' => $judul_surat,
			'isi_surat' => $isi_surat
			);

		$this->m_aplikasi->input_data('surat',$data);
		redirect('admin_surat/index');

	} else {
			$data['menu'] = "surat";
			$data['title'] = "Tambah Surat";
			$data['main'] = "v_tambah_surat";
			$this->load->view('header',$data);		
			}
	}
	function hapus($id_surat){
		$where = array('id_surat' => $id_surat);
		$this->m_aplikasi->hapus_data($where,'surat');
		redirect('admin_surat/index');
	}
	function edit($id_surat){
	if(isset($_POST['submit'])){	
		$id_surat = $this->input->post('id_surat');
		$nomer_surat = $this->input->post('nomer_surat');
		$judul_surat = $this->input->post('judul_surat');
		$isi_surat = $this->input->post('isi_surat');

	$data = array(
		'id_surat' => $id_surat,
		'nomer_surat' => $nomer_surat,
		'judul_surat' => $judul_surat,
		'isi_surat' => $isi_surat
	);

	$where = array(
		'id_surat' => $id_surat
	);

	$this->m_aplikasi->update_data($where,$data,'surat');
	redirect('admin_surat/index');

	} else {
	$where = array('id_surat' => $id_surat);
	$data['surat'] = $this->m_aplikasi->edit_data($where,'surat')->result();
	$data['menu'] = "surat";
	$data['title'] = "Edit Data Surat";
	$data['main'] = "v_edit_surat";
	$this->load->view('header',$data);
	}
}
}