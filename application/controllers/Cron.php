<?php
class Cron extends CI_Controller
{
	public function index()
	{
		if(is_cli())
		{
			$this->load->model('Concours_Model');
			$this->load->model('Participation_Model');
			$this->load->model('Resultats_Model');

			$liste_participation_concours = $this->Participation_Model->liste_participation_concours();
			$last_concours = $this->Concours_Model->last_concours();
			if($last_concours->date_fin < date('Y-m-d') && $last_concours->heure_fin < date('H:i:s'))
			{
				return;
			}

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

			$this->facebook->send_batch_pool();

			$adminMail = $this->_adminMail();

			$this->_sendMail($adminMail, $last_concours, $gagnant);
		}
	}


	private function _adminMail()
	{
		$appId = $this->config->item('facebook_app_id');
		$appSecret = $this->config->item('facebook_app_secret');

		$appToken = $this->facebook->request('get', '/oauth/access_token?client_id='.$appId.'&client_secret='.$appSecret.'&grant_type=client_credentials');

		$appAdmin = $this->facebook->request('get', $appId . '?fields=contact_email', $appToken['access_token']);

		return $appAdmin['contact_email'];
	}

	private function _sendMail($adminMail, $last_concours, $gagnant)
	{
		$this->load->library('email');

		$this->email->from('contact@dingo.fbdev.fr', 'Pardon Maman');
		$this->email->to($adminMail);

		$this->email->subject('Fin du concours ' . $last_concours->nom);
		$this->email->message('Fin du concours ' . $last_concours->nom . '. \n Le gagnant est : ' . $gagnant->prenom . ' ' . $gagnant->nom . '.');

		$this->email->send();
	}

}
