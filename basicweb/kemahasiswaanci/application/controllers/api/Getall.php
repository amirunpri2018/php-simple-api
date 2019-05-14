<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getall extends CI_Controller {

	public function index()
	{
		header("Content-Type:application/json");

		// inisialisasi penggunaan model
		$this->load->model('api/Getall_model', 'Getall_model');
		// ambil data dr DB dengan model
		$data = $this->Getall_model->ambildatamhs();

		echo json_encode($data);
	}

}
