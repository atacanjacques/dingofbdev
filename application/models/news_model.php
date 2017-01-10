<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class news_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     *    Ajouter un concours
     */
    public function add_concours()
    {
        $data = array(
            'nom' => $this->input->post('name_competition'),
            'date_debut' => $this->input->post('date_START'),
            'date_fin' => $this->input->post('date_END')
        );
        return $this->db->insert('concours', $data);

    }

    /**
     *    Édite une concours déjà existant
     */
    public function edit_concours()
    {

    }

    /**
     *    Supprime une concours
     */
    public function delete_concours()
    {

    }

    /**
     *    Retourne une liste des concours
     */
    public function list_concours()
    {

    }
}


/* End of file news_model.php */
/* Location: ./application/models/news_model.php */