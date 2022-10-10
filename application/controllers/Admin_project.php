<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_project extends CI_Controller{

	function index(){
	$data['menu'] = "project";	
	$data['title'] = "Daftar Project";
	$data['main'] = "v_daftar_project";
	$data['project'] = $this->m_aplikasi->tampil_data('project')->result();
	$this->load->view('header',$data);
	}

	function tambah(){
	if(isset($_POST['submit'])){	
	
		$id_project = $this->input->post('id_project');
		$nama_project = $this->input->post('nama_project');
		$no_pr = $this->input->post('no_pr');
		$no_sr = $this->input->post('no_sr');
		$status = $this->input->post('status');
		$nilai = $this->input->post('nilai');
 
		$data = array(
			'id_project' => $id_project,
			'nama_project' => $nama_project,
			'no_sr' => $no_sr,
			'no_pr' => $no_pr,
			'status' => $status,
			'nilai' => $nilai
			);

		$this->m_aplikasi->input_data('project',$data);
		redirect('admin_project/index');

	} else {
			$data['menu'] = "project";
			$data['title'] = "Tambah project";
			$data['main'] = "v_tambah_project";
			$this->load->view('header',$data);		
			}
	}
	function hapus($id_project){
		$where = array('id_project' => $id_project);
		$this->m_aplikasi->hapus_data($where,'project');
		redirect('admin_project/index');
	}

	function edit($id_project){
	if(isset($_POST['submit'])){	
	$id_project = $this->input->post('id_project');
	$nama_project = $this->input->post('nama_project');
	$no_pr = $this->input->post('no_pr');
	$no_sr = $this->input->post('no_sr');
	$status = $this->input->post('status');
	$nilai = $this->input->post('nilai');
	$data = array(
			'id_project' => $id_project,
			'nama_project' => $nama_project,
			'no_sr' => $no_sr,
			'no_pr' => $no_pr,
			'status' => $status,
			'nilai' => $nilai
			);

	$where = array(
		'id_project' => $id_project
	);

	$this->m_aplikasi->update_data($where,$data,'project');
	redirect('admin_project/index');

	} else {
	$where = array('id_project' => $id_project);
	$data['project'] = $this->m_aplikasi->edit_data($where,'project')->result();
	$data['menu'] = "project";
	$data['title'] = "Edit Data project";
	$data['main'] = "v_edit_project";
	$this->load->view('header',$data);
	}
}
}