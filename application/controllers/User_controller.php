<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __contruct()
	{
		parent::__contruct();
	
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['title'] = ;	
	}

}

/* End of file user_controller.php */
/* Location: ./application/controllers/user_controller.php */