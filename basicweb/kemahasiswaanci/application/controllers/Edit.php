<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function index()
	{
		echo 'controller edit';
	}

	public function data($id){
		$this->load->helper('url');

		// untuk ambil data detail
		$this->load->model('Edit_model');
		$data['dataMhs'] = $this->Edit_model->getDetailMhs($id);

		// untuk menampilkan
		$this->load->view('edit', $data);
	}

	public function aksi(){
		$this->load->helper('url');

		// model untuk eksekusi update 
		$this->load->model('Edit_model');
		$this->Edit_model->updateDataMhs();

		// setelah eksekusi kembalikan ke home
		redirect('/home');
	}

}
