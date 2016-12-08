<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('user_model');
	}

	public function index()
	{
		if ($this->session->userdata('login_u') == false) 
		{
			redirect('login');
		}
		else
		{
			redirect('dashboard');
		}		
	}

	public function login()
	{
		$model = $this->user_model;
		// Validasi
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" data-animate="fadeInLeft">', '</div>');

		if ($this->form_validation->run()== TRUE)
		{
			$username  = $this->input->post('username');
			$password  = sha1($this->input->post('password'));

			$cek_login = $model->dologin($username, $password);
			
			if ($cek_login->num_rows() > 0) 
			{
				$d = $model->dologin($username, $password)->row_array();

				$this->session->set_userdata('id_u', $d['user_id']);
				$this->session->set_userdata('username_u', $d['user_name']);
				$this->session->set_userdata('fullname_u', $d['user_full_name']);
				$this->session->set_userdata('role_u', $d['user_role']);
				$this->session->set_userdata('last_login_u', $d['user_last_login']);
				$this->session->set_userdata('login_u', true);

				//update Last Login
				$model->edit($d['user_id'], array('user_last_login' => date('Y-m-d H:i:s')));

				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('login_failed','<div class="alert alert-danger" data-animate="fadeInLeft">Username / Password salah </div>');
			}

		}

		$data['title'] = "Suket Offline";
		$this->load->view('login_view', $data);

	}

	public function logout(){

		$this->session->sess_destroy();

		redirect('login', 'refresh');

	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */