<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_login extends CI_Model{

		//proses cek query yang akan login
		function auth($email,$password){
			$query=$this->db->query("SELECT * FROM tbl_user WHERE email='$email' AND password='$password'  LIMIT 1");
			return $query;
		}
	}