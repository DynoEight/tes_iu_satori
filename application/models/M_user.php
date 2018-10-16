<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    //mengambil id_user
    function _Get_User($id_user){
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('tbl_user')->row();
        return $query;
    }
    
    //membuat fungsi tambah data user di user admin
    function _Create_User(){
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $name       = $this->input->post('name');
        $level      = $this->input->post('level');
        $status     = $this->input->post('status');
        $data = array(  
            'email'     => $email,
            'password'  => $password,
            'name'      => $name,
            'level'     => $level,
            'status'    => "aktif"
        );
        $this->db->insert('tbl_user',$data);
        return $this->db->insert_id();
    }

    //membuat edit data user berdasarkan id_user di user admin
    function _Update_User($id_user){
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $name       = $this->input->post('name');
        $level      = $this->input->post('level');
        $data = array(  
            'email'     => $email,
            'password'  => $password,
            'name'      => $name,
            'level'     => $level
        );
        $this->db->where('id_user',$id_user);
        $this->db->update('tbl_user',$data);
    }

    //membuat edit profile user berdasarkan id_user yang login pada saat itu
    function _Update_User_Profile($id_user){
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $name       = $this->input->post('name');
        $data = array(  
            'email'     => $email,
            'password'  => $password,
            'name'      => $name
        );
        $this->db->where('id_user',$id_user);
        $this->db->update('tbl_user',$data);
    }

    //membuat fungsi untuk upload foto dan edit foto user
    function _Create_Foto_User($photo,$id_user){
        if($photo != null){
            $data['photo'] = $photo;
            $this->db->where('id_user',$id_user);
            $this->db->update('tbl_user',$data);
        }
    }

    // Hapus Data Manage User
    public function delete($data) {
        $this->db->where('id_user',$data['id_user']);
        $this->db->delete('tbl_user',$data);
    }

    //membuat fungsi aktivasi akun
    public function aktivasi_akun($data) {
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('tbl_user',$data);
    }

    //membuat fungsi non-aktif akun/blokir akun
    public function non_aktif_akun($data) {
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('tbl_user',$data);
    }

    //Menampilkan semua data user di user admin
    function listing(){
        $this->db->select('*');
        $this->db->order_by('tbl_user.id_user','DESC');
        $query = $this->db->get('tbl_user');
        return $query->result();
    }

    //menampilkan data user berdasarkan session yang login dalam hal ini admin
    function view_user_admin($id_users){
        $this->db->select('*');
        $this->db->order_by('tbl_user.id_user','DESC');
        $this->db->where('level',"admin");
        $this->db->where('id_user',$id_users);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }

    //menampilkan data user berdasarkan session yang login dalam hal ini pengguna
    function view_user_pengguna($id_users){
        $this->db->select('*');
        $this->db->order_by('tbl_user.id_user','DESC');
        $this->db->where('level',"user");
        $this->db->where('id_user',$id_users);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }

    //Menghitung jumlah record semua data user di user admin
    public function jumlah_tbl_user() {
        $query = $this->db->get('tbl_user');
        return $query->num_rows();  
    }
}