<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moderation_model extends CI_Model
{

	// Affiche lea liste des users
	public function affichage_users()
	{
		$query = $this->db->get("users");
        return $query->result();
	}	


	// Banni un user => 'banni' = 1
	public function bannir()
	{

	 	$data = array(
			'banni' => '1'
		);

		$this->db->where('id_fb', $this->input->post('id_user_ban'));
		$this->db->update('users', $data);
	}	

	// Reintegre un user => 'banni' = 0
	public function reintegrer()
	{

	 	$data = array(
			'banni' => '0'
		);

		$this->db->where('id_fb', $this->input->post('id_user_reint'));
		$this->db->update('users', $data);
	}	


	public function filtreUser()
	{
			
		$this->db->select('*')
				 ->from('users')
				 ->like('id_fb', $this->input->post('filter_id'))
				 ->like('prenom', $this->input->post('filter_name'))
				 ->like('nom', $this->input->post('filter_surname'))
				 ->order_by('prenom', 'ASC');


		$query = $this->db->get();
		return $query->result();
	}



}