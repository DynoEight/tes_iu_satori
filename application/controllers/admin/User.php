<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
			$data['user'] = $this->M_user->listing(); // menampilkan semua data user
			$data['content'] = 'admin/user_management/list'; //membuat tampilan list data user
			$this->load->view('template',$data); //mengintegrasikan dengan template
		}
	}

	// membuat fungsi create dan edit data user
	public function form($id_user = null)
	{
		$id_users = $this->session->userdata('ses_id');
		$data['admin'] = $this->M_user->view_user_admin($id_users);
		$data['content']= 'admin/user_management/form'; //form inputan data user
		if($id_user == null){
			$data['form_type'] = 'INPUT'; //membuat create data user
			$data['user'] = null;
			$this->load->view('template', $data);
		}else{
			$data['form_type'] = 'EDIT'; //membuat edit data user
			$data['user'] = $this->M_user->_Get_User($id_user);
			$user = $data['user'];
			if($data['user'] == null){
				redirect(base_url('admin/user'));
			}else{
				$this->load->view('template', $data);
			}
		}
	}

	//menyimpan data user
	public function save_user()
	{	
		if($this->input->post('form_type') == "INPUT"){ //menyimpan data user pada saat create data
			$id_user = (string)$this->session->userdata('ses_id');
			$id_user = $this->M_user->_Create_User($id_user);
			$upload_photo = $this->uploadImage($id_user, 'photo');
			$photo = $upload_photo['filename'];
			$this->M_user->_Create_Foto_User($photo,$id_user); // menyimpan gambar
			$this->session->set_flashdata('sukses','Data User Berhasil Ditambahkan');
			redirect(base_url('admin/user'));
		}else if($this->input->post('form_type') == "EDIT"){ //menyimpan data user pada saat edit data
			$id_user = $this->input->post('id_user');
			$this->M_user->_Update_User($id_user);
			$upload_photo = $this->uploadImage($id_user, 'photo'); 
			$photo = $upload_photo['filename'];
			$this->M_user->_Create_Foto_User($photo,$id_user); // menyimpan gambar
			$this->session->set_flashdata('edit','Data User Berhasil Diupdate');
			redirect(base_url('admin/user'));
		}
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

	//menghapus data user berdasarkan id_user
	public function delete($id_user){
	    $data = array('id_user' => $id_user);
	    $this->M_user->delete($data);
	    $this->session->set_flashdata('hapus','Data User Berhasil Dihapus');
	    redirect(base_url('admin/user'));
  	}

  	//mengaktivasi akun data user berdasarkan id_user
  	public function aktivasi($id_user){
	    $data = array('id_user' => $id_user, 'status' => "aktif");
	    $this->M_user->aktivasi_akun($data);
	    $this->session->set_flashdata('sukses','Data User Berhasil Di aktivasi');
	    redirect(base_url('admin/user'));
  	}

  	//menonaktifkan atau memblok akun data user berdasarkan id_user
  	public function non_aktif($id_user){
	    $data = array('id_user' => $id_user, 'status' => "tidak aktif");
	    $this->M_user->non_aktif_akun($data);
	    $this->session->set_flashdata('edit','Data User Berhasil Di non-aktifkan');
	    redirect(base_url('admin/user'));
  	}
}
