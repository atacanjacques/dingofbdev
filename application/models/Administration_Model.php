<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration_model extends CI_Model
{
	public function get_cgu()
	{
		$this->db->select('cgu');
		$this->db->from('administration');

		return $this->db->get()->row()->cgu;
	}

	public function get_mentions_legales()
	{
		$this->db->select('mentions_legales');
		$this->db->from('administration');

		return $this->db->get()->row()->mentions_legales;
	}
}

