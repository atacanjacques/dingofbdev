<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function IndexAdmin()
    {
        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->view('Admin/IndexAdmin');
        $this->load->view('Admin/footerAdmin');
        $this->load->helper('url');
    }

    public function Create()
    {
        $this->load->view('Admin/headerAdmin');
        $this->load->view('Admin/menuAdmin');
        $this->load->view('Admin/CreerConcours');
        $this->load->view('Admin/footerAdmin');
        $this->load->helper('url');
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
