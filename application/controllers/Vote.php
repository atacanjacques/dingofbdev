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

		$this->load->model('Concours_Model');
		$concours = $this->Concours_Model->date_concours();
		if(!$concours){ redirect('/'); }
	}

	public function index($orderby = "rand", $page = 1)
	{
		$this->load->model('Participation_Model');
		$this->load->model('Vote_Model');

		$data['nb_participation'] = $this->Participation_Model->nb_participation();
		$data['page'] = $page;
		$data['orderby'] = $orderby;
		$data['liste_participation'] = $this->Participation_Model->liste_participation($orderby, $page);
		
		$voteur = $this->facebook->request('get', '/me');
		$id_voteur = $voteur['id'];
		$votes = $this->Vote_Model->get_votes($id_voteur);
		$voted_participant = [];
		foreach ($votes as $vote) {
			$voted_participant[] = $vote->participation_idparticipation;
		}
		$data['voted_participant'] = $voted_participant;

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

		$votes = $this->Vote_Model->get_votes($id_voteur);
		$voted_participant = [];
		foreach ($votes as $vote) {
			$voted_participant[] = $vote->participation_idparticipation;
		}

		$in_array = in_array($id_participation, $voted_participant);
		if(!$in_array)
		{
			$this->Vote_Model->add_vote($id_participation, $id_voteur);
		}
		redirect('/vote');
	}

	public function delete_vote($id_participation)
	{
		$this->load->model('Vote_Model');

		$voteur = $this->facebook->request('get', '/me');
		$id_voteur = $voteur['id'];

		$votes = $this->Vote_Model->get_votes($id_voteur);
		$voted_participant = [];
		foreach ($votes as $vote) {
			$voted_participant[] = $vote->participation_idparticipation;
		}

		$in_array = in_array($id_participation, $voted_participant);
		if($in_array)
		{
			$this->Vote_Model->delete_vote($id_participation, $id_voteur);
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
