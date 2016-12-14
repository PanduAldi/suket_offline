<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error_page extends CI_Controller {

	public function index()
	{
		$data['title'] = "Halaman Tidak Ditemukan";
		$this->template->display('error_page', $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */