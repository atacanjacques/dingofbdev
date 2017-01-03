<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function index()
	{
		$data["login_url"] = $this->facebook->login_url();
		$data["logout_url"] = $this->facebook->logout_url();

		$this->facebook->is_authenticated() ? $data["is_authenticated"] = TRUE : $data["is_authenticated"] = FALSE;

        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
        $this->load->helper('url');
	}

    public function gallery()
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('gallery');
        $this->load->view('footer');
        $this->load->helper('url');
    }

    public function price()
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('price');
        $this->load->view('footer');
        $this->load->helper('url');
    }

    public function upload()
    {
        $data["login_url"] = $this->facebook->login_url();
        $data["logout_url"] = $this->facebook->logout_url();

        $this->facebook->is_authenticated() ? $data["is_authenticated"] = TRUE : $data["is_authenticated"] = FALSE;

        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('upload', $data);
        $this->load->view('footer', $data);
        $this->load->helper('url');
    }

	public function logout()
	{
		$this->facebook->destroy_session();

		redirect('/');
	}
}
