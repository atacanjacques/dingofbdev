<?php
class Cron extends CI_Controller
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
		$this->load->model('Participation_Model');
		$this->load->model('Resultats_Model');

		$liste_participation_concours = $this->Participation_Model->liste_participation_concours();
		$last_concours = $this->Concours_Model->last_concours();
		$gagnant = $this->Resultats_Model->affiche_gagnant($last_concours->id)[0];

		foreach($liste_participation_concours as $participation)
		{
			$data = array(
				'caption' => 'Fin du concours ' . $last_concours->nom,
				'description' => 'Le gagnant du concours est ' . $gagnant->prenom . ' ' . $gagnant->nom,
				'from' => array('id' => $participation->id_fb, 'name' => $participation->nom),
				'link' => base_url(),
				'name' => 'PARDON MAMAN',
				'picture' => $gagnant->source_photo
				);

			$this->facebook->add_to_batch_pool('fin-concours', 'post', '/me/feed', $data, $participation->token);
		}

		$this->_isAdmin();
		// $this->facebook->send_batch_pool();
	}


	public function _isAdmin()
	{
		$appId = $this->config->item('facebook_app_id');
		$appSecret = $this->config->item('facebook_app_secret');

		$appToken = $this->facebook->request('get', '/oauth/access_token?client_id='.$appId.'&client_secret='.$appSecret.'&grant_type=client_credentials');

		$appAdmin = $this->facebook->request('get', $appId . '/roles?email', $appToken['access_token']);
		$userId = $this->facebook->request('get', '/me');

var_dump($appAdmin['data']);
	}

}
