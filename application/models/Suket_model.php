<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suket_model extends CI_Model {

	public $table = "suket";
	public $id = "suket_id";

	public function get($params = array())
	{
		if (isset($params['id'])) 
		{
			$this->db->where($this->id, $params['id']);
		}

		if (isset($params['bio_nik'])) {
			$this->db->where('bio_nik', $params['bio_nik']);
		}

		if (isset($params['limit'])) 
		{
			if (!isset($params['offset'])) 
			{
				$params['offset'] = NULL;
			}

			$this->db->limit($params['limit'], $params['offset']);
		}

		if (isset($params['suket_date'])) {
			$this->db->where('suket_date', $params['suket_date']);
		}

		if (isset($params['order_by'])) {
			$this->db->order_by($params['order_by'], 'desc');	
		} else {
			$this->db->order_by($this->id, 'desc');
		}

		if (isset($params['select'])) {
			$this->db->select($params['select']);
		}
		
		$res = $this->db->get($this->table);
		
		if (isset($params['id'])) {
			return $res->row_array();
		}
		else
		{
			return $res->result_array();
		}

	}

	public function add($record)
	{
		$this->db->insert($this->table, $record);
	}

	public function edit($id, $record)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $record);
	}

	public function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->where($this->table);
	}

	public function auto_number($lebar=0, $awalan=null)
	{
		$this->db->select("no_suket, suket_date")
				 ->from($this->table)
				 ->limit(1)
				 ->order_by('no_suket', 'desc');
		$query = $this->db->get();

		$row = $query->row_array();
		$cek = $query->num_rows();
		

		if ($cek == 0) 
		{
			$nomor = 1;

		}
		else
		{
			if ($row['suket_date'] != date('Y-m-d')) {
				$nomor = 1;	
			}
			else
			{		
				$nomor = intval(substr($row['no_suket'], strlen($awalan)))+1;
			}
		}

		if ($lebar > 0) 
		{
			$result = $awalan.str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
		}
		else
		{
			$result = $awalan.$nomor;
		}

		return $result;
	}

	public function join_bio($suket_id)
	{
		$this->db->select('no_suket, suket_date, suket_time, bio.*');
		$this->db->join('bio', 'bio.bio_nik = suket.bio_nik');
		$this->db->where($this->id, $suket_id);
		return $this->db->get($this->table)->row();
	}

}

/* End of file  */
/* Location: ./application/models/ */