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

	public function index($orderby = "rand", $page = 1)
	{
		$this->load->model('Participation_Model');
		$data['nb_participation'] = $this->Participation_Model->nb_participation();
		$data['page'] = $page;
		$data['orderby'] = $orderby;
		$data['liste_participation'] = $this->Participation_Model->liste_participation($orderby, $page);


		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('gallery', $data);
		$this->load->view('footer');
		$this->load->helper('url');
	}

	public function add_vote($id_participation)
	{
		$this->load->model('Vote_Model');

		$voteur = $this->facebook->request('get', '/me');
		$id_voteur = $voteur['id'];

		$vote = $this->Vote_Model->get_vote($id_voteur);
		if(!is_null($vote))
		{
			$this->Vote_Model->delete_vote($id_voteur);
		}
		$this->Vote_Model->add_vote($id_participation,  $id_voteur);
		redirect('/vote');
	}

	public function delete_vote()
	{
		$this->load->model('Vote_Model');

		$voteur = $this->facebook->request('get', '/me');
		$id_voteur = $voteur['id'];

		$vote = $this->Vote_Model->get_vote($id_voteur);
		if(!is_null($vote))
		{
			$this->Vote_Model->delete_vote($id_voteur);
		}
		redirect('/vote');
	}

	public function add_signalement($id_participation)
	{
		$this->load->model('Participation_Model');
		$this->Participation_Model->add_signalement($id_participation);
		redirect('/vote');
	}
}
