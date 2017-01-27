<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}
	
	public function index()
	{

	}

}
