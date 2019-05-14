<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {
	
	public function data($id){
		$this->load->helper('url');

		// model untuk eksekusi update 
		$this->load->model('Delete_model');
		$this->Delete_model->deleteDataMhs($id);

		// setelah eksekusi kembalikan ke home
		redirect('/home');
	}
}