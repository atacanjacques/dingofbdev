<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		$login_url = $this->facebook->login_url();

		redirect($login_url);
	}

	public function logout()
	{
		$this->facebook->destroy_session();

		redirect('/');
	}

	public function login_redirect()
	{
		redirect('/');
	}
}
