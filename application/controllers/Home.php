<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
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
		$this->load->model('Concours_Model');
		$data['concours'] = $this->Concours_Model->date_concours();

		if(isset($this->permissionsMissing))
		{
			$data ['permissionsMissing'] = $this->permissionsMissing;
		}

		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('index', $data);
		$this->load->view('footer');
	}

	public function price()
	{
		$this->load->model('Lots_Model');
		$data['lots'] = $this->Lots_Model->get_lots();

		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('price', $data);
		$this->load->view('footer');
	}

	public function upload()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('upload');
		$this->load->view('footer');
	}

	public function cgu()
	{
		$this->load->model('Administration_Model');
		$data['cgu'] = $this->Administration_Model->get_cgu();
		$this->load->view('cgu', $data);
	}

	public function mentions_legales()
	{
		$this->load->model('Administration_Model');
		$data['mentions_legales'] = $this->Administration_Model->get_mentions_legales();
		$this->load->view('Mentions', $data);

	}
}
