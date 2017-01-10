<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function IndexAdmin()
    {

        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->view('Admin/IndexAdmin');
        $this->load->view('Admin/footerAdmin');
    }

    public function Create()
    {
        $this->form_validation->set_rules('name_competition', 'Nom du concours', 'required');
        $this->form_validation->set_rules('date_START', 'Date de Début', 'required');
        $this->form_validation->set_rules('date_END', 'Date de Fin', 'required');
        $this->form_validation->set_rules('create_accueil', 'Page d\'accueil', 'required');
        $this->form_validation->set_rules('create_prix', 'Page prix', 'required');
        $this->form_validation->set_rules('create_rules', 'Page régles',
            'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Admin/headerAdmin');
            $this->load->view('Admin/menuAdmin');
            $this->load->view('Admin/CreerConcours');
            $this->load->view('Admin/footerAdmin');
        } else {
            $this->news_model->add_concours();
            $this->load->view('Admin/formsuccess');
        }
    }

    public function edit()
    {
        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->view('Admin/editConcours');
        $this->load->view('Admin/footerAdmin');
        $this->load->helper('url');
    }

    public function moderation()
    {
        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->view('Admin/moderation');
        $this->load->view('Admin/footerAdmin');
        $this->load->helper('url');
    }

    public function Style()
    {
        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->view('Admin/EditTemplate');
        $this->load->view('Admin/footerAdmin');
        $this->load->helper('url');
    }

    public function logout()
    {
        $this->facebook->destroy_session();

        redirect('/');
    }
}
