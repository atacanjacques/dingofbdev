<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moderation_model extends CI_Model
{

	// Affiche lea liste des users
	public function affichage_users()
	{
		$query = $this->db->get("users");
        return $query->result();
	}	


	// Banni un user
	public function bannir()
	{

	 	$data = array(
			'banni' => '1'
		);

		$this->db->where('id_fb', $this->input->post('id_user_ban'));
		$this->db->update('users', $data);
	}	

	// Reintegre un user
	public function reintegrer()
	{

	 	$data = array(
			'banni' => '0'
		);

		$this->db->where('id_fb', $this->input->post('id_user_reint'));
		$this->db->update('users', $data);
	}	



}