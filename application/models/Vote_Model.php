<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vote_Model extends CI_Model
{
	public function get_votes($id_voteur)
	{
		$this->db->select('*');
		$this->db->from('vote');
		$this->db->where('id_voteur', $id_voteur);

		return $this->db->get()->result();

	}

	public function add_vote($id_participation, $id_voteur)
	{
		$data = array(
			'id_voteur' => $id_voteur,
			'participation_idparticipation' => $id_participation
			);

		$this->db->insert('vote', $data);
	}

	public function delete_vote($id_participation, $id_voteur)
	{
		$this->db->where('participation_idparticipation', $id_participation);
		$this->db->where('id_voteur', $id_voteur);
		$this->db->delete('vote');
	}
}

