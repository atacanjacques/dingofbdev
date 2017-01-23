<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participate extends MY_Controller {

	public function index($photo_id = NULL)
	{
		$this->output->enable_profiler(TRUE);

		if($photo_id != NULL){
			$this->load->model('Participation_Model');

			$choice = $this->facebook->request('get', $photo_id . '?fields=images,id');
			$photo_id = $choice['images'][0]['source'];
			$user_id = $choice['id'][0];

			echo '<h1>IMAGE AJOUTE</h1>';
			$this->Participation_Model->insert_participation($photo_id, $user_id);
		}
		else{
			echo '<a href="/participate/album">mes albums</a>';
			echo '<br><a href="/participate/add">ajouter image fb</a>';
		}
	}


	public function album($album_id = NULL)
	{
		$this->output->enable_profiler(TRUE);

		if($album_id == NULL)
		{
			$data['albums'] = $this->facebook->request('get', '/me/albums')['data'];
			$this->load->view('albums', $data);

		}
		else
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
	}

	public function add()
	{
		$this->output->enable_profiler(TRUE);

		echo '<img src="/tmp/uploaded_photos/dingo.jpg" />';

		$this->facebook->user_upload_request('/tmp/uploaded_photos/dingo.jpg', ['message' => 'This is a test upload']);

	}

}