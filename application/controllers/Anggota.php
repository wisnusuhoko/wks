<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller{

	function index(){
	$data['anggota'] = $this->m_anggota->tampil_data()->result();
	$this->load->view('v_tampil',$data);
	}
	function tambah(){
		$this->load->view('v_input');
	}
	function tambah_aksi(){
		$id_anggota = $this->input->post('id_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
 
		$data = array(
			'id_anggota' => $id_anggota,
			'nama_anggota' => $nama_anggota,
			'alamat' => $alamat,
			'telp' => $telp
			);

		$this->m_anggota->input_data('anggota',$data);
		redirect('anggota/index');
	}
	function hapus($id_anggota){
		$where = array('id_anggota' => $id_anggota);
		$this->m_anggota->hapus_data($where,'anggota');
		redirect('anggota/index');
	}
	function edit($id_anggota){
	$where = array('id_anggota' => $id_anggota);
	$data['anggota'] = $this->m_anggota->edit_data($where,'anggota')->result();
	$this->load->view('v_edit',$data);
	}
	function update(){
	$id_anggota = $this->input->post('id_anggota');
	$nama_anggota = $this->input->post('nama_anggota');
	$alamat = $this->input->post('alamat');
	$telp = $this->input->post('telp');

	$data = array(
		'nama_anggota' => $nama_anggota,
		'alamat' => $alamat,
		'telp' => $telp
	);

	$where = array(
		'id_anggota' => $id_anggota
	);

	$this->m_anggota->update_data($where,$data,'anggota');
	redirect('anggota/index');
}
}