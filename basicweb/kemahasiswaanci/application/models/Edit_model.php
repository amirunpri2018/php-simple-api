<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_model extends CI_Model {

	// function ambil data
	public function getDetailMhs($id){
		
		// buka koneksi database
		$this->load->database();

		// buat query sql
		$sql = "SELECT * FROM mahasiswa WHERE id_mhs='$id'";

		// eksekusi query sql
		$result = $this->db->query($sql);

		// uraikan hasil query jadi array
		$data = $result->result_array();

		// var_dump($data);

		// kembalikan data ke controller
		return $data;
	}

	public function updateDataMhs(){
		// membuka koneksi db
		$this->load->database();

		// S: upload gambar
		// inisialisasi helper form
		$this->load->helper('form');

		// configurasi fungsi upload
		$config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';

        // inisialisasi fungsi upload file
        $this->load->library('upload', $config);

        // eksekusi upload file
        $this->upload->do_upload('fotomhs');
        // E: upload gambar

		// menangkap input
		$id = $this->input->post('id');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		// tangkap nama file foto
		$foto = $_FILES['fotomhs']['name'];

		// bikin query
		$sql = "UPDATE mahasiswa SET nim='$nim', nama_mhs='$nama', alamat='$alamat', foto='$foto' WHERE id_mhs='$id';";

		// eksekusi query
		$this->db->query($sql);

		return;
	}
}