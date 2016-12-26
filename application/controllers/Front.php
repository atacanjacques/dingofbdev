<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function index()
	{
		$data["login_url"] = $this->facebook->login_url();
		$data["logout_url"] = $this->facebook->logout_url();

		$this->facebook->is_authenticated() ? $data["is_authenticated"] = TRUE : $data["is_authenticated"] = FALSE;

		$this->load->view('index', $data);
	}

	public function logout()
	{
		$this->facebook->destroy_session();

		redirect('/');
	}
}
