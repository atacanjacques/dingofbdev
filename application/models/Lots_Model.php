<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lots_Model extends CI_Model
{
	public function get_lots()
	{
		$this->load->model('Concours_Model');
		$concoursActuel = $this->Concours_Model->date_concours();
		if($concoursActuel)
		{
			$this->db->select('*');
			$this->db->where('concours_id', $concoursActuel->id);
			$this->db->from('lots');

			return $this->db->get()->row();
		}
	}
}

