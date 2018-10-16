<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login'); //mengambil query
    }

    //menampilkan tampilan halaman login
    function index(){
        $this->load->view('login');
    }

    //membuat fungsi authentication pada saat proses login
    function auth(){
        $email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_session=$this->M_login->auth($email,$password);

        if($cek_session->num_rows() > 0){ 
            $data=$cek_session->row_array();
            $this->session->set_userdata('masuk',TRUE);
             if($data['level']=='admin' && $data['status']=='aktif'){ //Akses admin
                $this->session->set_userdata('akses','1');
                $this->session->set_userdata('ses_id',$data['id_user']);
                $this->session->set_userdata('ses_email',$data['email']);
                $this->session->set_userdata('ses_nama',$data['name']);
                redirect('admin/dashboard');

             }else if($data['level']=='user' && $data['status']=='aktif'){ //akses penyedia loker
                $this->session->set_userdata('akses','2');
                $this->session->set_userdata('ses_id',$data['id_user']);
                $this->session->set_userdata('ses_email',$data['email']);
                $this->session->set_userdata('ses_nama',$data['name']);
                redirect('user/dashboard');
             }else {
                $this->session->set_flashdata('gagal','Email Anda tidak aktif atau sedang di blok! Silahkan hubungi Admin.');
                redirect('login');
             }
        }else{
            $this->session->set_flashdata('gagal','Email atau Password Anda salah!');
            redirect('login');
        }
    }

    //membuat fungsi logout
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}
