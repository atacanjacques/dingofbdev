<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
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
		redirect('/');
	}

	public function loginVote()
	{
		$_SESSION['refusedPage'] = "vote";
		$permissionsMissing = $this->_permissionsMissing($_SESSION['refusedPage']);

		if($this->facebook->is_authenticated() && !isset($permissionsMissing))
		{		
			redirect("/vote");
		}
		else{
			redirect("/");
		}
	}

	public function loginParticipate()
	{
		$_SESSION['refusedPage'] = "participate";
		$permissionsMissing = $this->_permissionsMissing($_SESSION['refusedPage']);

		if($this->facebook->is_authenticated() && !isset($permissionsMissing))
		{		
			redirect("/participate");
		}
		else{
			redirect("/");
		}
	}

	public function _permissionsMissing($refusedPage)
	{
		if($this->facebook->is_authenticated())
		{
			$permissionsInfo = array(
				'email' => 'Vous contacter',
				'user_photos' => 'Voir vos photos',
				'publish_actions' => 'Publie sur votre mur'
				);

			if($refusedPage == "participate")
			{
				$permissions = array('email', 'user_photos', 'publish_actions');
				$redirectUrl = base_url() . '/participate';
			}
			elseif($refusedPage == "vote")
			{
				$permissions = $this->config->item('facebook_permissions');
				$redirectUrl = base_url();
			}

			$reqFb = $this->facebook->request('get', '/me/permissions');

			if(!isset($reqFb['error'])){ 
				foreach ($reqFb['data'] as $permission) {
					if($permission['status'] == 'granted')
					{
						$permissionsGranted[] = $permission['permission'];
					}
				}

				$permissionsMissing = array_diff($permissions, $permissionsGranted);

				if(sizeof($permissionsMissing) > 0)
				{
					$permissionsMissingInfo['refusedPage'] = $refusedPage;
					$permissionsMissingInfo['permissions'] = $permissionsMissing;
					$permissionsMissingInfo['info'] = $permissionsInfo;
					return $permissionsMissingInfo;
				}
			}
		}
	}
}
