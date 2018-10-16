<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
    	parent::__construct();
    	$this->load->model(array('M_gps','M_user')); // mengambil query
    	//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		} 
  	}

  	// menampilkan jumlah record data gps berdasarkan id_user yang login
	public function index()
	{
		if ($this->session->userdata('level') == 'user' || $this->session->userdata('akses')=='2'){
			$id_user = $this->session->userdata('ses_id'); // mengambil session id user dari user yang login
			$data['pengguna'] = $this->M_user->view_user_pengguna($id_user); // menampilkan data user pengguna yang login
			$data['gps'] = $this->M_gps->jumlah_tbl_gps_user($id_user); // menampilkan jumlah record data gps berdasarkan user yang login pada saat itu
			$data['content']= 'user/dashboard'; ////membuat tampilan dashboard
			$this->load->view('template_user', $data); //mengintegrasikan dengan template
		}
	}
}
