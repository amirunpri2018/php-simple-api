<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

	public function index()
	{
		// url helper, supaya bisa pake base_url
		$this->load->helper('url');

		$this->load->view('add');
	}

	public function aksi(){
		// url helper, supaya bisa pake base_url dan redirect
		$this->load->helper('url');

		// inisialisasi model
		$this->load->model('Add_model');
		// panggil metod untuk input
		$this->Add_model->adddatamahasiswa();

		// redirect ke home
		redirect('/home');
	}
}
