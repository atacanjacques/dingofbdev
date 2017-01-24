<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Status :
		// Not authenticated = 0
		// Authenticated = 1
		// Missing permissions = 2

		switch ($this->_check_status()) {
			case 0:
			if($this->router->fetch_class() != "login"){
				redirect('/');
			}
			break;

			case 1:
				// Logged in
			break;

			case 2:
			redirect($this->_getReRequestUrl());
			break;
		}
	}

	public function _check_status()
	{
		if($this->facebook->is_authenticated()){
			$response = $this->facebook->request('get', '/me/permissions');
			if(!isset($response['error'])){
				if($this->router->class == "participate")
				{
					$permissions = array('user_photos', 'publish_actions');
				}
				else{
					$permissions = $this->config->item('facebook_permissions');
				}
				$user_permissions = [];
				foreach ($response['data'] as $key => $item) {
					if(in_array($item['permission'], $permissions) && $item['status'] == 'granted')
						array_push($user_permissions, $item['permission']);
				}

				$missing_permissions = array_diff($permissions, $user_permissions);

				if(!empty($missing_permissions)){
					$helper =  $this->facebook->object()->getRedirectLoginHelper();
					$re_login_url = $helper->getReRequestUrl('http://dingo.fbdev.fr', $missing_permissions);
					return 2;
				}
				else{
					return 1;
				}
			}
			else{
				return 0;
			}
		}
		else{
			return 0;
		}
	}

	public function _getReRequestUrl()
	{
		if($this->facebook->is_authenticated()){
			$response = $this->facebook->request('get', '/me/permissions');
			if($this->router->class == "participate")
			{
				$permissions = array('user_photos', 'publish_actions');
			}
			else{
				$permissions = $this->config->item('facebook_permissions');
			}
			$user_permissions = [];
			foreach ($response['data'] as $key => $item) {
				if(in_array($item['permission'], $permissions) && $item['status'] == 'granted')
					array_push($user_permissions, $item['permission']);
			}

			$missing_permissions = array_diff($permissions, $user_permissions);

			if(!empty($missing_permissions)){
				$helper =  $this->facebook->object()->getRedirectLoginHelper();
				$re_login_url = $helper->getReRequestUrl('http://dingo.fbdev.fr', $missing_permissions);

				return $re_login_url;
			}
		}
	}
}