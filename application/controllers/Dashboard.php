<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	function index(){
		$data['menu'] = "dashboard";
		$data['title'] = "Halaman Dashboard";
	    $data['main'] = "v_dashboard3";
	    
		$this->load->view('header',$data);
		
	
	}
}