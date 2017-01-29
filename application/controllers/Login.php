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