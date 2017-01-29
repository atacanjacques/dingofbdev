<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if(ENVIRONMENT !== 'production')
        {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('index');
        $this->load->view('footer');
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
    }
    public function upload()
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('upload');
        $this->load->view('footer');
    }

    public function mentions()
    {
        $this->load->view('Mentions');
        $this->load->helper('url');
    }

    public function cgu()
    {
        $this->load->view('cgu');
        $this->load->helper('url');
    }

	public function logout()
	{
		$this->facebook->destroy_session();

		redirect('/');
	}
}
