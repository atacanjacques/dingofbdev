<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultats_model extends CI_Model
{

	// retourne toutes les info du gagnant
	public function affiche_gagnant(){

		 $this->db->select('vote.participation_idparticipation, users.*, participation.source_photo')
		 		  ->from('concours')
		 		  ->join('participation', 'participation.concours_id = concours.id', 'inner')
		 		  ->join('vote', 'vote.participation_idparticipation = participation.id', 'inner')
		 		  ->join('users', 'users.id_fb = participation.users_id_fb', 'inner')
		 		  ->where('concours.id', '1')
		 		  ->group_by('vote.participation_idparticipation')
		 		  ->order_by('vote.participation_idparticipation', 'DESC')
		 		  ->limit(1);
		
		$query = $this->db->get();
		return $query->result();


	}

}


