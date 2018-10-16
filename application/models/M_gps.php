<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gps extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    //mengambil id_gps
    function _Get_GPS($id_gps){
        $this->db->where('id_gps',$id_gps);
        $query = $this->db->get('tbl_gps')->row();
        return $query;
    }
    
    //membuat fungsi tambah data gps yang berdasarkan user login
    function _Create_GPS($id_user){
        $brand_gps      = $this->input->post('brand_gps');
        $model_gps      = $this->input->post('model_gps');
        $gps_name       = $this->input->post('gps_name');
        $waranty_month  = $this->input->post('waranty_month');
        $buy_date       = $this->input->post('buy_date');
        $sold_date      = $this->input->post('sold_date');
        $sold_to        = $this->input->post('sold_to');
        $description    = $this->input->post('description');
        $data = array(  
            'brand_gps'     => $brand_gps,
            'model_gps'     => $model_gps,
            'gps_name'      => $gps_name,
            'waranty_month' => $waranty_month,
            'buy_date'      => $buy_date,
            'sold_date'     => $sold_date,
            'sold_to'       => $sold_to,
            'description'   => $description,
            'id_user'       => $id_user
        );
        $this->db->insert('tbl_gps',$data);
        return $this->db->insert_id();
    }

    //membuat fungsi edit data gps berdasarkan id_gps
    function _Update_GPS($id_gps){
        $brand_gps      = $this->input->post('brand_gps');
        $model_gps      = $this->input->post('model_gps');
        $gps_name       = $this->input->post('gps_name');
        $waranty_month  = $this->input->post('waranty_month');
        $buy_date       = $this->input->post('buy_date');
        $sold_date      = $this->input->post('sold_date');
        $sold_to        = $this->input->post('sold_to');
        $description    = $this->input->post('description');
        $data = array(  
            'brand_gps'     => $brand_gps,
            'model_gps'     => $model_gps,
            'gps_name'      => $gps_name,
            'waranty_month' => $waranty_month,
            'buy_date'      => $buy_date,
            'sold_date'     => $sold_date,
            'sold_to'       => $sold_to,
            'description'   => $description
        );
        $this->db->where('id_gps',$id_gps);
        $this->db->update('tbl_gps',$data);
    }

    //membuat fungsi untuk upload foto dan edit foto gps
    function _Create_Foto_GPS($photo,$id_gps){
        if($photo != null){
            $data['photo'] = $photo;
            $this->db->where('id_gps',$id_gps);
            $this->db->update('tbl_gps',$data);
        }
    }


    // Hapus Data Manage GPS
    public function delete($data) {
        $this->db->where('id_gps',$data['id_gps']);
        $this->db->delete('tbl_gps',$data);
    }

    //Menampilkan semua data di user admin
    function listing(){
        $this->db->select('tbl_gps.*,tbl_user.name,tbl_user.level');
        $this->db->from('tbl_gps');
        $this->db->join('tbl_user','tbl_user.id_user=tbl_gps.id_user','LEFT');
        $this->db->order_by('tbl_gps.id_gps','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    //menampilkan data gps berdasarkan id_user yang login
    function listing_gps_user($id_users){
        $this->db->select('*');
        $this->db->where('id_user',$id_users);
        $this->db->order_by('tbl_gps.id_gps','DESC');
        $query = $this->db->get('tbl_gps');
        return $query->result();
    }

    //Menghitung jumlah semua data record di user admin
    public function jumlah_tbl_gps() {
        $query = $this->db->get('tbl_gps');
        return $query->num_rows();  
    }

    //Menghitung jumlah semua data record di user pengguna
    public function jumlah_tbl_gps_user($id_user) {
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('tbl_gps');
        return $query->num_rows();  
    }
}