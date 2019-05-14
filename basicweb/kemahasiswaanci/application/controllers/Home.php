<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// url helper, supaya bisa pake base_url
		$this->load->helper('url');

		// inisialisasi penggunaan model
		$this->load->model('Home_model');
		// ambil data dr DB dengan model
		$dtweb['datamhs'] = $this->Home_model->ambildatamhs();

		// static data
		$dtweb['nama'] = "Yasir";

		// load tampilan
		$this->load->view('home', $dtweb);
	}

}
