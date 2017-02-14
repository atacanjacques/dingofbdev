<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if(isset($_SESSION['refusedPage']))
		{
			$refusedPage = $_SESSION['refusedPage'];
			unset($_SESSION['refusedPage']);

			$this->refusedPage = $refusedPage;
			$this->permissionsMissing = $this->_permissionsMissing($refusedPage);
		}

		$_SESSION['isAdmin'] = 0;

		switch ($this->_check_status()){
			// Not authenticated ||  Missing permissions
			case 0:
			if($this->router->fetch_class() != "home"
				&& $this->router->fetch_class() != "login")
			{
				redirect('/');
			}
			break;

			// Authenticated
			case 1:
			$_SESSION['isAdmin'] = $this->_isAdmin();
			break;

			// Deleted App
			case 2:
			$this->facebook->destroy_session();
			
			if($this->router->fetch_class() != "home"
				&& $this->router->fetch_class() != "login")
			{
				redirect('/');
			}

			break;
		}
	}

	public function _check_status()
	{
		if(!$this->facebook->is_authenticated()){ return 0; }

		if($this->router->class == "participate")
		{
			$permissions = array('email', 'user_photos', 'publish_actions');
		}
		else{
			$permissions = $this->config->item('facebook_permissions');
		}

		if($this->facebook->is_authenticated())
		{
			$reqFb = $this->facebook->request('get', '/me/permissions');

			if(isset($reqFb['error'])){ return 2; }

			foreach ($reqFb['data'] as $permission) {
				if($permission['status'] == 'granted')
				{
					$permissionsGranted[] = $permission['permission'];
				}
			}

			$permissionsMissing = array_diff($permissions, $permissionsGranted);

			if(sizeof($permissionsMissing) == 0)
			{
				return 1;
			}
			else{
				return 0;
			}
		}
	}

	public function _getReRequestUrl($page)
	{
		if($page == "participate")
		{
			$permissions = array('email', 'user_photos', 'publish_actions');
		}
		elseif($page == "vote")
		{
			$permissions = $this->config->item('facebook_permissions');
		}

		$reqFb = $this->facebook->request('get', '/me/permissions');

		foreach ($reqFb['data'] as $permission) {
			if($permission['status'] == 'granted')
			{
				$permissionsGranted[] = $permission['permission'];
			}
		}

		$permissionsMissing = array_diff($permissions, $permissionsGranted);

		if(sizeof($permissionsMissing) > 0)
		{
			$helper =  $this->facebook->object()->getRedirectLoginHelper();
			$reLoginUrl = $helper->getReRequestUrl(base_url(), $permissionsMissing);

			return $reLoginUrl;
		}
		else
		{
			return FALSE;
		}

	}

	public function _isAdmin()
	{
		$appId = $this->config->item('facebook_app_id');
		$appSecret = $this->config->item('facebook_app_secret');

		$appToken = $this->facebook->request('get', '/oauth/access_token?client_id='.$appId.'&client_secret='.$appSecret.'&grant_type=client_credentials');

		$appAdmin = $this->facebook->request('get', $appId . '/roles', $appToken['access_token']);
		$userId = $this->facebook->request('get', '/me');

		foreach ($appAdmin['data'] as $admin) {
			$adminId[] = $admin['user'];
		}

		if(in_array($userId['id'], $adminId))
		{
			return 1;
		}
		else
		{
			return 0;
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