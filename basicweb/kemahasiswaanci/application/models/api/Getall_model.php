<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getall_model extends CI_Model {

	// function ambil data
	public function ambildatamhs(){
		
		// buka koneksi database
		$this->load->database();

		// buat query sql
		$sql = "SELECT * FROM mahasiswa";

		// eksekusi query sql
		$result = $this->db->query($sql);

		// uraikan hasil query jadi array
		$data = $result->result_array();

		// var_dump($data);

		// kembalikan data ke controller
		return $data;
	}

}