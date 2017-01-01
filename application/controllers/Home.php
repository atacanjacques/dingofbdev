<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->_is_really_authenticated();

		$this->load->view('index');
		
		$this->output->enable_profiler(TRUE);
	}

	public function logout()
	{
		$this->facebook->destroy_session();

		redirect('/');
	}

	public function login()
	{
		$login_url = $this->facebook->login_url();
		redirect($login_url);
	}

	public function _check_status()
	{
		if($this->facebook->is_authenticated()){
			$response = $this->facebook->request('get', '/me/permissions');
			if(!isset($response['error'])){
				$permissions = $this->config->item('facebook_permissions');
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
			$permissions = $this->config->item('facebook_permissions');
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

	public function _is_really_authenticated()
	{
		// Status :
		// Not authenticated = 0
		// Authenticated = 1
		// Missing permissions = 2

		switch ($this->_check_status()) {
			case 0:
			if($this->router->fetch_method() != "index"){
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
}
