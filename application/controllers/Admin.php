<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        
        if(ENVIRONMENT !== 'production')
        {
            $this->output->enable_profiler(TRUE);
        }
    }


    public function index()
    {
        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->view('Admin/indexAdmin');
        $this->load->view('Admin/footerAdmin');
    }


    // Fonction qui créé un nouveau concours 
    public function createConcours()
    {

        // On vérifie qu'il n'y a pas de concours encore en cours
        $this->load->model('Concours_model');
        $liste = $this->Concours_model->date_concours();


        // Si il n'y a pas de concours en cours on peut en créer un 
        if($liste == NULL){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name_competition', 'Nom du concours', 'required');
            $this->form_validation->set_rules('date_START', 'Date de début', 'required|callback_verifDate');
            $this->form_validation->set_rules('heure_START', 'Heure de début', 'required');
            $this->form_validation->set_rules('date_END', 'Date de fin', 'required');
            $this->form_validation->set_rules('heure_END', 'Heure de fin', 'required');
            $this->form_validation->set_rules('create_accueil', 'Page d\'accueil', 'required');
            $this->form_validation->set_rules('name_lot', 'Nom du lot à gagner', 'required');
            $this->form_validation->set_rules('create_lot', 'Description du lot', 'required');
            $this->form_validation->set_rules('create_rules', 'Page régles', 'required');


            // Config de l'upload de l'image du lot a gagner
            $config['file_name']     = 'img_concours_';
            $config['upload_path']   = './uploads/img_concours';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 8000;
            $config['max_width']     = 1024;
            $config['max_height']    = 2048;

            $this->load->library('upload', $config);


            // Si le formulaire n'est pas valide on le ré-affiche 
            if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('Admin/headerAdmin');
                    $this->load->view('Admin/menuAdmin');
                    $this->load->view('Admin/CreerConcours', array('error' => ' ' ));
                    $this->load->view('Admin/footerAdmin');
            }


            // on vérifie les paramètres de l'image du lot
            elseif (! $this->upload->do_upload('img_lot'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('Admin/headerAdmin');
                    $this->load->view('Admin/menuAdmin');
                    $this->load->view('Admin/CreerConcours', $error);
                    $this->load->view('Admin/footerAdmin');
            }


            // Si il est valide on l'envoi en bdd 
            else
            {
                   // on insère le fichier dans le serveur
                   $data = array('upload_data' => $this->upload->data());

                   // on récupère l'url d'enregistrement de l'image
                   $url_img = $data['upload_data']['full_path'];

                    //Transfering data to Model
                    $this->load->model('Concours_model');
                    $id_concours = $this->Concours_model->add_concours();
                    $this->Concours_model->add_lot($url_img, $id_concours);
                    $this->load->view('Admin/formsuccess', $data);
            }
        }

        // Si il y a deja un concours en cours on affiche une erreur
        else{
            echo "Il y a déjà un concours en cours !";
        }

    }


    // Vérifie la cohérance des dates
    public function verifDate($date_debut)
    {
        if ($date_debut < date("Y-m-d") || $date_debut > $this->input->post('date_END'))
        {
            $this->form_validation->set_message('verifDate', 'Veuillez vérifier vos dates');
            return FALSE;
        }

        else
        {
            return TRUE;
        }
    }


    // Affiche la liste des concours en cours
    public function listConcours()
    {
        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->model('Concours_model');
        $liste = $this->Concours_model->list_concours();
        $this->load->view('Admin/historiqueConcours', array('liste' => $liste));
        $this->load->view('Admin/footerAdmin');


    } 


    // Fonction pour modifier un concours
    public function modifConcours()
    {


        // Si je clique sur modifier ca me retourne le formulaire du concours
        if($this->input->post('modifConcours')) 
        {     

            $this->load->view('Admin/headerAdmin');
            $this->load->view('Admin/menuAdmin');
            $this->load->model('Concours_model');
            $liste = $this->Concours_model->affichage_concours();

            $this->load->view('Admin/ModifierConcours', array('liste' => $liste));
            $this->load->view('Admin/footerAdmin');

        }

        // Si je clique sur supprimer, ca supprime le concours
        else {

            $this->load->model('Concours_model');
            $url_lot = $this->Concours_model->select_url_lot();
            foreach ($url_lot as $row)
            {
                $row->url;
            }


            $this->Concours_model->delete_concours($row->url);
            $this->load->view('Admin/formsuccess');

        }

    }

    // Envoi en BDD le concours modifié
    public function editConcours(){

            $this->load->model('Concours_model');
            $this->Concours_model->edit_concours();
            $this->load->view('Admin/formsuccess');

    }


    // public function moderation()
    // {
    //     $this->load->view('Admin/headerAdmin');
    //     $this->load->view('Admin/menuAdmin');
    //     $this->load->view('Admin/moderation');
    //     $this->load->view('Admin/footerAdmin');
    //     $this->load->helper('url');
    // }

    // public function Style()
    // {
    //     $this->load->view('Admin/headerAdmin');
    //     $this->load->view('Admin/menuAdmin');
    //     $this->load->view('Admin/EditTemplate');
    //     $this->load->view('Admin/footerAdmin');
    //     $this->load->helper('url');
    // }

    // public function logout()
    // {
    //     $this->facebook->destroy_session();

    //     redirect('/');
    // }

}
