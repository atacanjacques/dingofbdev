<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participate extends MY_Controller {

	public function index()
	{
		$this->output->enable_profiler(TRUE);

		$data['albums'] = $this->facebook->request('get', '/me/albums')['data'];
		$this->load->view('participate', $data);
	}


	public function album($album_id)
	{
		$this->output->enable_profiler(TRUE);
		
		$photos = $this->facebook->request('get', $album_id . '/photos')['data'];

		$data['photos'] = array();
		foreach ($photos as $photo) {
			$pic = $this->facebook->request('get', $photo['id'] . '?fields=images');
			array_push($data['photos'], $pic);
		}
		$this->load->view('photos', $data);
	}

	public function choice($photo_id)
	{
		$choice = $this->facebook->request('get', $photo_id . '?fields=images');

		var_dump($choice);
	}
}
