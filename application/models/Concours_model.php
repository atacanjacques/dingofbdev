<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Concours_model extends CI_Model
{

	// Nom de la table Concours
	protected $table_concours = "concours";


	// On retourne les concours qui sont encore en cours
	public function date_concours()
	{

		$now = date("Y-m-d");

		$query = $this->db->get_where($this->table_concours, array('date_fin >' => $now));

		return $query->row();		
	}


	// Ajouter un concours
	public function add_concours()
	{

		$data = array(

			'nom' => $this->input->post('name_competition'),
			'date_debut' => $this->input->post('date_START'),
			'heure_debut' => $this->input->post('heure_START'),
			'date_fin' => $this->input->post('date_END'),
			'heure_fin' => $this->input->post('heure_END'),
			'accueil' => $this->input->post('create_accueil'),
			'reglement' => $this->input->post('create_rules')
			
			);

		$this->db->insert($this->table_concours, $data);


		$insert_id = $this->db->insert_id();
		return  $insert_id;

	}


	// Ajouter un lot à gagner
	public function add_lot($url_img, $id_concours)
	{

		$data = array(

			'nom' => $this->input->post('name_lot'),
			'url' => $url_img,
			'description' => $this->input->post('create_lot'),
			'concours_id' => $id_concours
			);

		$this->db->insert("lots", $data);

	}


	// Retourne une liste des concours
	public function list_concours()
	{
		$query = $this->db->get($this->table_concours);
		return $query->result();
	}	

	// Export la liste des concours
	public function export_concours()
	{
		
   		$this->db->select('id, nom, date_debut, heure_debut, date_fin, heure_fin');
   		return $query = $this->db->get('concours');
	}


	// Affiche le concours afin de le modifier
	public function affichage_concours()
	{

		$this->db->select('concours.id AS id_concours, concours.nom AS nom_concours, date_debut, heure_debut, date_fin, 
			heure_fin, accueil, reglement, lots.nom AS nom_lot, lots.url, lots.description')
		->from('concours')
		->join('lots', 'lots.concours_id = concours.id')
		->where('concours.id', $this->input->post('modifConcours'));

		$query = $this->db->get();
		return $query->result();
	}	


	// Permet de filtrer les concours
	public function filtre_concours()
	{
			
		$this->db->select('*')
				 ->from('concours')
				 ->like('id', $this->input->post('filter_id'))
				 ->like('nom', $this->input->post('filter_name'))
				 ->like('date_debut', $this->input->post('filter_date_deb'))
				 ->like('date_debut', $this->input->post('filter_date_fin'))
				 ->order_by('id', 'ASC');


		$query = $this->db->get();
		return $query->result();
	}



	// Modifie le concours
	public function edit_concours()
	{

		$data = array(
			'nom' => $this->input->post('name_competition'),
			'date_debut' => $this->input->post('date_START'),
			'heure_debut' => $this->input->post('heure_START'),
			'date_fin' => $this->input->post('date_END'),
			'heure_fin' => $this->input->post('heure_END'),
			'accueil' => $this->input->post('create_accueil'),
			'reglement' => $this->input->post('create_rules')
			);

		$this->db->where('id', $this->input->post('id_concours'));
		$this->db->update($this->table_concours, $data);
		
	}


	// Modifie le lot à gagner
	public function edit_lot($url_img)
	{

		$data = array(

			'nom' => $this->input->post('name_lot'),
			'url' => $url_img,
			'description' => $this->input->post('create_lot')
			);

		$this->db->where('concours_id', $this->input->post('id_concours'));
		$this->db->update("lots", $data);

	}

	// Récupère l'url du lot du concours à supprimer
	public function select_url_lot()
	{

		$this->db->select('url')
		->from('lots')
		->where('concours_id', $this->input->post('supprConcours'));

		$query = $this->db->get();
		return $query->result();

	}
	

	// Supprime une concours
	public function delete_concours($url_lot)
	{

		// on supprime l'image du lot sur le serveur
		unlink ($url_lot); 

		// on supprime le concours 
		$data = array('id' => $this->input->post('supprConcours'));

		$this->db->where($data)
		->delete($this->table_concours);
	}
}

