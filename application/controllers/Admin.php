<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {


    function __construct()
    {
        parent::__construct();

        if(!$_SESSION['isAdmin']){ redirect('/'); }

        $this->load->helper('form');

        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');

        if(ENVIRONMENT !== 'production')
        {
            $this->output->enable_profiler(TRUE);
        }
    }


    public function index()
    {

        $this->load->model('Resultats_Model');
        $liste = $this->Resultats_Model->affiche_gagnant();
        $this->load->view('Admin/indexAdmin', array('liste' => $liste)); 


        $this->load->view('Admin/footerAdmin');
    }


    // Fonction qui créé un nouveau concours 
    public function createConcours()
    {

        // On vérifie qu'il n'y a pas de concours encore en cours
        $this->load->model('Concours_Model');
        $liste = $this->Concours_Model->date_concours();


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
                    $this->load->view('Admin/CreerConcours', array('error' => ' ' ));
                    $this->load->view('Admin/footerAdmin');
            }


            // on vérifie les paramètres de l'image du lot
            elseif (! $this->upload->do_upload('img_lot'))
            {
                    $error = array('error' => $this->upload->display_errors());
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
                    $this->load->model('Concours_Model');
                    $id_concours = $this->Concours_Model->add_concours();
                    $this->Concours_Model->add_lot($url_img, $id_concours);
                    $this->load->view('Admin/formsuccess', $data);
            }
        }

        // Si il y a deja un concours en cours on affiche une erreur
        else{
            echo "Vous ne pouvez pas créer de concours car il y en a déjà un en cours !";
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
        $this->load->model('Concours_Model');
        $liste = $this->Concours_Model->list_concours();

        //On vérfie qu'il y a bien des concours dans la BDD
        if (!empty($liste)) {
            $this->load->view('Admin/historiqueConcours', array('liste' => $liste)); 
        }
        else{
            echo "Il n'y a aucun concours dans votre historique";
        }
        
        $this->load->view('Admin/footerAdmin');


    } 


    //Permet de télécharger le tableau en CSV
    public function export_concours_CSV()
    {
        $this->load->dbutil();
        $this->load->helper('file');

        $this->load->model('Concours_Model');
        $result = $this->Concours_Model->export_concours();

        $delimiter = ";";
        $newline = "\r\n";
        $csv = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        if (!write_file('./uploads/export_concours/liste_concours_'.date("Y-m-d_H-i-s").'.csv', $csv))
        {
        echo 'Un problème est survenu lors de la génération du fichier CSV';
        }
        else
        {
        echo 'La liste des concours a bien été exportée';
        }
    }


    // Permet de filter les concours (dans onglet historique du menu)
    public function rechercheConcours()
    {

        $this->load->model('Concours_Model');
        $liste = $this->Concours_Model->filtre_concours();
        $this->load->view('Admin/historiqueConcours', array('liste' => $liste)); 

        $this->load->view('Admin/footerAdmin');        

    }


    // Fonction pour modifier un concours
    public function modifConcours()
    {


        // Si je clique sur modifier ca me retourne le formulaire du concours
        if($this->input->post('modifConcours')) 
        {     

            $this->load->model('Concours_Model');
            $liste = $this->Concours_Model->affichage_concours();

            $this->load->view('Admin/ModifierConcours', array('liste' => $liste));
            $this->load->view('Admin/footerAdmin');

        }

        // Si je clique sur supprimer, ca supprime le concours ainsi que son lot associé
        else {

            $this->load->model('Concours_Model');
            $url_lot = $this->Concours_Model->select_url_lot();
            foreach ($url_lot as $row)
            {
                $row->url;
            }

            $this->Concours_Model->delete_concours($row->url);
            $this->load->view('Admin/formsuccess');

        }

    }

    // Envoi en BDD le concours modifié
    public function editConcours(){

            $this->load->model('Concours_Model');
            $this->Concours_Model->edit_concours();
            $this->load->view('Admin/formsuccess');

    }


    // Affiche la liste des utlisateurs de l'application
    public function listUsers()
    {

        $this->load->model('Moderation_Model');
        $liste = $this->Moderation_Model->affichage_users();
        $this->load->view('Admin/listUsers', array('liste' => $liste)); 

        $this->load->view('Admin/footerAdmin');
    }

    // Banni ou réintègre un membre
    public function bannirUser(){

        // Banni un membre
        if($this->input->post('id_user_ban'))
        {
            $this->load->model('Moderation_Model');
            $this->Moderation_Model->bannir();
            redirect('Admin/listUsers');
        }

        // Réintègre un membre
        else
        {
            $this->load->model('Moderation_Model');
            $this->Moderation_Model->reintegrer();
            redirect('Admin/listUsers');
        }
    }

    // Permet de filter les utilisateurs (dans onglet modération du menu)
    public function rechercheUser()
    {

        $this->load->model('Moderation_Model');
        $liste = $this->Moderation_Model->filtreUser();
        $this->load->view('Admin/listUsers', array('liste' => $liste)); 

        $this->load->view('Admin/footerAdmin');        

    }


    //Permet d'exporter la liste des utilisateurs en CSV
    public function export_users_CSV()
    {
        $this->load->dbutil();
        $this->load->helper('file');

        $this->load->model('Moderation_Model');
        $result = $this->Moderation_Model->export_users();

        $delimiter = ";";
        $newline = "\r\n";
        $csv = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        if (!write_file('./uploads/export_users/liste_users_'.date("Y-m-d_H-i-s").'.csv', $csv))
        {
        echo 'Un problème est survenu lors de la génération du fichier CSV';
        }
        else
        {
        echo 'La liste des utilisateurs a bien été exportée';
        }
    }


    // Affiche les images reportees
    public function imgReport()
    {

        $this->load->model('Moderation_Model');
        $liste = $this->Moderation_Model->img_signale();
        $this->load->view('Admin/imgReport', array('liste' => $liste)); 


        $this->load->view('Admin/footerAdmin');

    }


    // Permet de bannir les images signalees
    public function signalBan()
    {

        $this->load->model('Moderation_Model');
        $this->Moderation_Model->bannir();
        $this->Moderation_Model->delete_participation();
        redirect('Admin/imgReport');
        
    }


    // Affiche les CGU et Mentions legales sur le BO
    public function administration()
    {

        $this->load->model('Reglementation_Model');
        $liste = $this->Reglementation_Model->administration_Model();
        $this->load->view('Admin/reglementation', array('liste' => $liste));
    }


    // Permet de modifier les CGU et Mentions legales
    public function editAdministration()
    {

        $this->load->model('Reglementation_Model');
        $this->Reglementation_Model->edit_administration();
        $this->load->view('Admin/formsuccess');

    }


    public function style(){
        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->view('Admin/Style');
        $this->load->view('Admin/footerAdmin');
    }

}

