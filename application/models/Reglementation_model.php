<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reglementation_Model extends CI_Model
{


	// Affiche les cgu et mentions legales
	public function administration_Model()
	{

		$this->db->select('*')
				 ->from('administration');

		$query = $this->db->get();
		return $query->result();

	}


	// Modifie les cgu et mentions legales
	public function edit_administration()
	{

	 	$data = array(
			'cgu' => $this->input->post('cgu'),
			'mentions_legales' => $this->input->post('mentions_legales')
		);

		$this->db->update('administration', $data);
		
	}


}