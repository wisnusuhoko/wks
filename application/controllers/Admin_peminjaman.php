<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_peminjaman extends CI_Controller{

	function index(){
	if(isset($_POST['submit'])){	
	
		$id_anggota = $this->input->post('id_anggota');
		$kode_buku = $this->input->post('kode_buku');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		//mengatur format tgl pinjam dari mm/dd/yyyy menjadi yyyy/mm/dd sblm tersimpan ke database
		$tanggal = explode('/', $tgl_pinjam);
		$tgl_pinjam2 = $tanggal[2].'/'.$tanggal[0].'/'.$tanggal[1];
		//menambahkan tgl_pinjam 7 hari dan disimpan ke tgl_harus_kembali
		$tgl_harus_kembali    = date('Y-m-d', strtotime('+7 days', strtotime($tgl_pinjam)));
 
		$data = array(
			'id_anggota' => $id_anggota,
			'kode_buku' => $kode_buku,
			'tgl_pinjam' => $tgl_pinjam2,
			'tgl_harus_kembali' => $tgl_harus_kembali
			);

		$this->m_aplikasi->input_data('peminjaman',$data);
		redirect('admin_peminjaman');

	} else {
			$data['title'] = "Input Transaksi Peminjaman";
			$data['main'] = "v_tambah_peminjaman";
			$data['anggota'] = $this->m_aplikasi->tampil_data('anggota')->result();
			$data['buku'] = $this->m_aplikasi->tampil_data('buku')->result();
			$data['peminjaman'] = $this->m_aplikasi->tampil_join3('peminjaman','anggota','buku','id_anggota','kode_buku','idpeminjaman','DESC')->result();
			$this->load->view('template',$data);		
			}
	}
	
	function hapus($idpeminjaman){
		$where = array('idpeminjaman' => $idpeminjaman);
		$this->m_aplikasi->hapus_data($where,'peminjaman');
		redirect('admin_peminjaman/index');
	}
}