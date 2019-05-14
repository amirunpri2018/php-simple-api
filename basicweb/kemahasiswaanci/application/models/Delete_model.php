<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_model extends CI_Model {
	public function deleteDataMhs($id){
		// buka koneksi database
		$this->load->database();

		// buat query sql
		$sql = "DELETE FROM mahasiswa WHERE id_mhs='$id'";

		// eksekusi query sql
		$this->db->query($sql);
		
		return;
	}
}