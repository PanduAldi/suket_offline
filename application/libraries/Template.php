<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function display($template, $data=null)
	{
		$data = array(
						"_sidebar" => $this->ci->load->view('template/sidebar', $data, true),
						"_content" => $this->ci->load->view($template, $data, true)
					);
		#load
		$this->ci->load->view('template', $data);
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
