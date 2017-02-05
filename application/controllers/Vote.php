<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends MY_Controller
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
		$this->load->model('Vote_Model');
		$data['participations'] = $this->Vote_Model->read_vote();

		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('gallery', $data);
		$this->load->view('footer');
		$this->load->helper('url');
	}
}
