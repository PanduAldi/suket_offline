<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('pejabat_model', 'suket_model'));
		
		if ($this->session->userdata("login_u") == false) {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$select = "count(suket_id) AS jumlah";
		$data['suket'] = $this->suket_model->get(array('select' => $select, 'suket_date' => date('Y-m-d')));
		
		$tot = "count(suket_id) AS jumlah";
		$data['suket_total'] = $this->suket_model->get(array('select' => $select));

		$this->template->display('dashboard', $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */