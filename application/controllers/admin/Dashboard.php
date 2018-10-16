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

  	// menampilkan jumlah record data dari tabel user dan tabel gps
	public function index()
	{
		if ($this->session->userdata('level') == 'admin' || $this->session->userdata('akses')=='1'){
			$id_user = $this->session->userdata('ses_id'); // mengambil session id user dari user yang login
			$data['admin'] = $this->M_user->view_user_admin($id_user); // menampilkan data user admin yang login
			$data['user'] = $this->M_user->jumlah_tbl_user(); // menghitung jumlah record data user yang masuk
			$data['gps'] = $this->M_gps->jumlah_tbl_gps(); // menghitung jumlah record data gps yang masuk
			$data['content']= 'admin/dashboard'; // menampilkan data ke dalam konten
			$this->load->view('template', $data); // mengintegrasikan data ke dalam template
		}
	}
}
