<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
    	parent::__construct();
    	$this->load->model(array('M_user')); // mengambil query
    	//validasi jika user belum login
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		} 
  	}

  	//menampilkan semua data user
	public function index()
	{
		if ($this->session->userdata('level') == 'admin' || $this->session->userdata('akses')=='1'){
			$id_users = $this->session->userdata('ses_id'); // mengambil session id user dari user yang login
			$data['admin'] = $this->M_user->view_user_admin($id_users); // menampilkan data user admin yang login
			$data['content'] = 'admin/profile/user'; //membuat tampilan list data user
			$this->load->view('template',$data); //mengintegrasikan dengan template
		}
	}

	public function form($id_users){
		$data['admin'] = $this->M_user->view_user_admin($id_users); // menampilkan data user admin yang login
		$data['content'] = 'admin/profile/form'; //membuat tampilan edit data profile
		$this->load->view('template',$data); //mengintegrasikan dengan template	
	}

	// membuat fungsi save profile untuk edit data user admin
	public function save_profile()
	{
		$id_user = $this->input->post('id_user');
	    $this->M_user->_Update_User_Profile($id_user);
	    $upload_photo = $this->uploadImage($id_user, 'photo');
		$photo = $upload_photo['filename'];
		$this->M_user->_Create_Foto_User($photo,$id_user);
		$this->session->set_flashdata('sukses','Profile Berhasil Diupdate');
	    redirect(base_url('admin/profile'));
	}

	// membuat fungsi upload gambar
	function uploadImage($id_user, $name){
		$targetDir = 'files/users/'.$id_user.'/';
		if (!file_exists($targetDir)) {
			$oldmask = umask(0);
			mkdir($targetDir, 0777);
			umask($oldmask);
		}

		// mengkonfigurasikan format file, ukuran, path dan lain-lain
		$config = array(
			'file_name'		=> 'user_'.$id_user,
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
}
