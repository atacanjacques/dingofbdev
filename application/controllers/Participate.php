<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participate extends CI_Controller {

	public function index()
	{
		$this->_is_really_authenticated();

		$this->load->view('index');
		
		$this->output->enable_profiler(TRUE);
	}

}
