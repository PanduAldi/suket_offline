<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suket_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('pejabat_model', 'user_model', 'bio_model', 'suket_model'));
		if ($this->session->userdata('login_u') == false) 
		{
			redirect('login');
		}
	}

	public function cetak_suket()
	{
		$data['title'] = "Cetak Suket";
		$this->template->display('suket/cetak_suket', $data);
	}

	public function cek_bio()
	{
		$nik = $this->input->post('nik');

		//cek nik
		$cek  = $this->bio_model->cek_nik($nik);

		if ($cek->num_rows() > 0) 
		{
			$r = $cek->row_array();
			$ex_t = explode("-", $r['bio_tanggal_lahir']);
			$tgl_lahir = $ex_t[2]."-".$ex_t[1]."-".$ex_t[0];
			$d['status'] = "success";
			$d['data'] = array(
							"nama" => $r['bio_nama'],
							"tempat" => $r['bio_tempat_lahir'],
							"tl" => $tgl_lahir,
							"jk" => $r['bio_jk'],
							"alamat" => $r['bio_alamat'],
							"rt_rw" => $r['bio_rt_rw'],
							"desa" => $r['bio_desa'],
							"kecamatan" => $r['bio_kecamatan'],
							"agama" => $r['bio_agama'],
							"status" => $r['bio_status_perkawinan'],
							"pekerjaan" => $r['bio_pekerjaan'],
							"kewarganegaraan" => $r['bio_kewarganegaraan'] 
						 );

			$cek_history = $this->suket_model->get(array('bio_nik' => $r['bio_nik']));

			$d['history'] = array();
			$no = 1;
			foreach ($cek_history as $cek) 
			{
				$d['history'][] = array(
									"no" => $no++,
									"no_surat" => $cek['no_suket'],
									"cek_detail" => "<a href='".site_url("detail_cetak/".$cek['suket_id'])."'><i class='fa fa-search-plus'></i></a>"
								 );
			}
		}
		else
		{
			$d['status'] = "error";
			$d['message'] = "History Biodata tidak ditemukan pada database. Silahkan input manual terlebih dahulu";
		}

		echo json_encode($d);
	}


	public function print_suket()
	{
		$data['pejabat'] = $this->pejabat_model->get(array('id' => 1));

		$input = $this->input;

		$data['nik'] = $input->post('nik');
		$data['nama']  = $input->post('nama');
		$data['tempat'] = $input->post('tempat_lahir');
		$data['tl']  = $input->post('tanggal_lahir');
		$data['jk'] = $input->post('jk');
		$data['alamat'] = $input->post('alamat');
		$data['rt_rw']  = $input->post('rt_rw');
		$data['desa'] = $input->post('desa');
		$data['kecamatan'] = $input->post('kecamatan');
		$data['agama'] = $input->post('agama');
		$data['status'] = $input->post('status');
		$data['pekerjaan'] = $input->post('pekerjaan');
		$data['kewarganegaraan'] = $input->post('kewarganegaraan');

		$data['no_suket'] = $this->suket_model->auto_number(5,'3329/SKT/'.date('Ymd').'/');
		$data['title'] = "Cetak Suket ".$data['no_suket'];


		//cek nik
		$cek_nik = $this->bio_model->cek_nik($data['nik']);

		if ($cek_nik->num_rows() > 0) 
		{
			$r = $cek_nik->row();
			$e = explode("-", $data['tl']);
			$t_lahir = $e[2]."-".$e[1]."-".$e[0];

			$rec_nik = array(
								"bio_nama" => $data['nama'],
								"bio_tempat_lahir" => $data['tempat'],
								"bio_tanggal_lahir" => $t_lahir,
								"bio_jk" => $data['jk'],
								"bio_alamat" => $data['alamat'],
								"bio_rt_rw" => $data['rt_rw'],
								"bio_desa" => $data['desa'],
								"bio_kecamatan" => $data['kecamatan'],
								"bio_agama" => $data['agama'],
								"bio_status_perkawinan" => $data['status'],
								"bio_pekerjaan" => $data['pekerjaan'],
								"bio_kewarganegaraan" => $data['kewarganegaraan']
							);

			$this->bio_model->edit($r->bio_id, $rec_nik);
		}
		else
		{
			$e = explode("-", $data['tl']);
			$t_lahir = $e[2]."-".$e[1]."-".$e[0];

			$rec_nik = array(
								"bio_id" => '',
								"bio_nik" => $data['nik'],
								"bio_nama" => $data['nama'],
								"bio_tempat_lahir" => $data['tempat'],
								"bio_tanggal_lahir" => $t_lahir,
								"bio_jk" => $data['jk'],
								"bio_alamat" => $data['alamat'],
								"bio_rt_rw" => $data['rt_rw'],
								"bio_desa" => $data['desa'],
								"bio_kecamatan" => $data['kecamatan'],
								"bio_agama" => $data['agama'],
								"bio_status_perkawinan" => $data['status'],
								"bio_pekerjaan" => $data['pekerjaan'],
								"bio_kewarganegaraan" => $data['kewarganegaraan']
							);

			$this->bio_model->add($rec_nik);
		}


		//input suket
		$record = array(
							"suket_id" => '',
							"no_suket" => $data['no_suket'],
							"bio_nik" => $data['nik'],
							"user_id" => $this->session->userdata('id_u'),
							"suket_date" => date('Y-m-d'),
							"suket_time" => date('H:i:s')
						);

		$this->suket_model->add($record);

		$html = $this->load->view('suket/printout_suket', $data, true);
		pdf_create($html, 'suket.pdf', TRUE, 'potrait');

	}

	public function daftar_cetak()
	{
		$data['title'] = "Daftar Cetak";
		$this->template->display('suket/daftar_cetak', $data);
	}

	public function suket_json()
	{
		$this->load->library('datatables');

		$this->datatables->select('suket.no_suket AS no_surat, suket.bio_nik AS nik, bio.bio_nama AS nama, suket.suket_date AS tanggal_cetak');
		$this->datatables->join('bio', 'bio.bio_nik = suket.bio_nik');
		$this->datatables->from('suket');
		echo $this->datatables->generate();
	}

	public function detail_cetak()
	{
		$data['title'] = "Detail Biodata Suket";

		$id = $this->uri->segment(2);
		$data['d'] = $this->suket_model->join_bio($id);
	
		$this->template->display('suket/detail_cetak', $data);
	}


	public function coba_seribu()
	{
		$no  = 1;

		for ($i=1; $i <= 1000 ; $i++) { 

			$record_nik = array(
									"bio_id" => '',
									"bio_nik" => "nik".$i
								);
			$this->bio_model->add($record_nik);

			$record = array(
								"suket_id" => '',
								"bio_nik" => "nik".$i
							);
			$this->suket_model->add($record);
			echo $i."<br>";
		}
	}

}

/* End of file suket_controller.php */
/* Location: ./application/controllers/suket_controller.php */