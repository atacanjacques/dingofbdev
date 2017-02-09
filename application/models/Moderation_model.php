<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moderation_model extends CI_Model
{

	// Affiche lea liste des users
	public function affichage_users()
	{
		$query = $this->db->get("users");
        return $query->result();
	}	


	// Exporte la liste des users
	public function export_users()
	{
		
   		$this->db->select('id_fb, nom, prenom, mail');
   		return $query = $this->db->get('users');
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


	// Permet de filtrer les utilisateurs
	public function filtreUser()
	{
			
		$this->db->select('*')
				 ->from('users')
				 ->like('id_fb', $this->input->post('filter_id'), 'after')
				 ->like('prenom', $this->input->post('filter_name'), 'after')
				 ->like('nom', $this->input->post('filter_surname'), 'after')
				 ->like('mail', $this->input->post('filter_email'), 'after')
				 ->order_by('id_fb', 'ASC');


		$query = $this->db->get();
		return $query->result();
	}


	// On affiche les images signalés
	public function img_signale()
	{
		$this->db->select('*')
				 ->from('participation')
				 ->join('users', 'participation.users_id_fb = users.id_fb', 'inner')
				 ->where('participation.signalement', '1');


		$query = $this->db->get();
		return $query->result();

	}


	// On supprime la participation du l'utilisateur banni
	public function delete_participation(){
	
	$data = array('users_id_fb' => $this->input->post('id_user_ban'));

	$this->db->where($data)
			 ->delete('participation');

	}


}