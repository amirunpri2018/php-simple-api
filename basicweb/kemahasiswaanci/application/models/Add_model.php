<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_model extends CI_Model {

	public function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png'; 
	    // $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;

	    return $config;
	}

	public function adddatamahasiswa(){
		// membuka koneksi db
		$this->load->database();
		$this->load->library('upload');

		$dataInfo = array();
    	$files = $_FILES;
    	$cpt = count($_FILES['fotomhs']['name']);

    	// var_dump($cpt);die();

    	for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['fotomhs']['name']= $files['fotomhs']['name'][$i];
	        $_FILES['fotomhs']['type']= $files['fotomhs']['type'][$i];
	        $_FILES['fotomhs']['tmp_name']= $files['fotomhs']['tmp_name'][$i];
	        $_FILES['fotomhs']['error']= $files['fotomhs']['error'][$i];
	        $_FILES['fotomhs']['size']= $files['fotomhs']['size'][$i];  

	        $config['upload_path'] = './images/';
        	$config['allowed_types'] = 'gif|jpg|png';  

	        $this->upload->initialize($this->set_upload_options());
	        $this->upload->do_upload('fotomhs');
	        $dataInfo[] = $this->upload->data();
	        
		}

		// S: upload gambar
		// inisialisasi helper form
		// $this->load->helper('form');
		// configurasi fungsi upload
		// $config['upload_path'] = './images/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // inisialisasi fungsi upload file
        // $this->load->library('upload', $config);
        // eksekusi upload file
        // $this->upload->do_upload('fotomhs');
        // E: upload gambar

		// menangkap input
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		// tangkap nama file foto
		$foto = $_FILES['fotomhs']['name'][1];

		// bikin query
		$sql = "INSERT INTO mahasiswa(nim, nama_mhs, alamat, foto) VALUES('$nim','$nama','$alamat','$foto');";

		// eksekusi query
		$this->db->query($sql);

		return;
	}

}