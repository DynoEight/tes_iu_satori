<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gps extends CI_Controller {

	function __construct(){
    	parent::__construct();
    	$this->load->model(array('M_gps','M_user'));
    	//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		} 
  	}

  	//menampilkan semua data gps
	public function index()
	{
		if ($this->session->userdata('level') == 'admin' || $this->session->userdata('akses')=='1'){
			$id_users = $this->session->userdata('ses_id'); // mengambil session id user dari user yang login
			$data['admin'] = $this->M_user->view_user_admin($id_users); // menampilkan data user admin yang login
			$data['gps'] = $this->M_gps->listing(); // menampilkan data gps yang di inputkan admin ataupun user/pengguna
			$data['content'] = 'admin/gps/list'; //membuat tampilan list data gps
			$this->load->view('template',$data); //mengintegrasikan dengan template
		}
	}

	// membuat fungsi create dan edit data gps
	public function form($id_gps = null)
	{
		$id_users = $this->session->userdata('ses_id');
		$data['admin'] = $this->M_user->view_user_admin($id_users);
		$data['content']= 'admin/gps/form'; //form inputan data gps
		if($id_gps == null){
			$data['form_type'] = 'INPUT'; //membuat create data gps
			$data['gps'] = null;
			$this->load->view('template', $data);
		}else{
			$data['form_type'] = 'EDIT'; //membuat edit data gps
			$data['gps'] = $this->M_gps->_Get_GPS($id_gps);
			$gps = $data['gps'];
			if($data['gps'] == null){
				redirect(base_url('admin/gps'));
			}else{
				$this->load->view('template', $data);
			}
		}
	}

	//menyimpan data gps
	public function save_gps()
	{	
		if($this->input->post('form_type') == "INPUT"){ //menyimpan data gps pada saat create data
			$id_user = (string)$this->session->userdata('ses_id');
			$id_gps = $this->M_gps->_Create_GPS($id_user);
			$upload_photo = $this->uploadImage($id_gps, 'photo');
			$photo = $upload_photo['filename'];
			$this->M_gps->_Create_Foto_GPS($photo,$id_gps); // menyimpan gambar
			$this->session->set_flashdata('sukses','Data GPS Berhasil Ditambahkan');
			redirect(base_url('admin/gps'));
		}else if($this->input->post('form_type') == "EDIT"){ //menyimpan data gps pada saat edit data
			$id_gps = $this->input->post('id_gps');
			$this->M_gps->_Update_GPS($id_gps);
			$upload_photo = $this->uploadImage($id_gps, 'photo');
			$photo = $upload_photo['filename'];
			$this->M_gps->_Create_Foto_GPS($photo,$id_gps); // menyimpan gambar
			$this->session->set_flashdata('edit','Data GPS Berhasil Diupdate');
			redirect(base_url('admin/gps'));
		}
	}

	// membuat fungsi upload gambar
	function uploadImage($id_gps, $name){
		$targetDir = 'files/gps_images/'.$id_gps.'/';
		if (!file_exists($targetDir)) {
			$oldmask = umask(0);
			mkdir($targetDir, 0777);
			umask($oldmask);
		}

		// mengkonfigurasikan format file, ukuran, path dan lain-lain
		$config = array(
			'file_name'		=> 'gps_'.$id_gps,
			'allowed_types' => 'jpg|jpeg|png',
			'max_size'      => 2048,
			'overwrite'     => TRUE,
			'upload_path' 	=> $targetDir
		);
		
		if(($_FILES [$name]['name'] != null)){
			$this->upload->initialize($config);
			if (! $this->upload->do_upload($name)){
				$error = $this->upload->display_errors();
				return array( 'status' => 'error', 'msg' => $error, 'filename' => null);
			}else{
				$uploaded_data = $this->upload->data();
				$file_name = $uploaded_data['file_name'];
				return array( 'status' => 'success', 'msg' => 'success', 'filename' => $file_name);
			}
		}else{
			return array( 'status' => 'success', 'msg' => 'success', 'filename' => null);
		}
	}

	//menghapus data gps berdasarkan id_gps
	public function delete($id_gps){
	    $data = array('id_gps' => $id_gps);
	    $this->M_gps->delete($data);
	    $this->session->set_flashdata('hapus','Data GPS Berhasil Dihapus');
	    redirect(base_url('admin/gps'));
  	}
}
