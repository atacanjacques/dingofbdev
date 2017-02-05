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
		if($this->facebook->is_authenticated())
		{
			$redirectUrl = $this->_getReRequestUrl("vote");
			if($redirectUrl)
			{
				redirect($redirectUrl);
			}
			else
			{
				redirect("/");
			}
		}


		$login_url = $this->facebook->login_url();
		redirect($login_url);

	}

	public function loginParticipate()
	{
		$_SESSION['refusedPage'] = "participate";
		if($this->facebook->is_authenticated())
		{
			$redirectUrl = $this->_getReRequestUrl("participate");
			if($redirectUrl)
			{
				redirect($redirectUrl);
			}
			else
			{
				redirect("/participate");
			}
		}

		$this->config->set_item('facebook_permissions', array('email', 'user_photos', 'publish_actions'));

		$login_url = $this->facebook->login_url();
		redirect($login_url);
	}

}
