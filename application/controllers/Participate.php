<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participate extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		if(ENVIRONMENT !== 'production')
		{
			$this->output->enable_profiler(TRUE);
		}

		$this->load->model('Concours_Model');
		$concours = $this->Concours_Model->date_concours();
		if(!$concours){ redirect('/'); }
	}

	public function index($photo_id = NULL)
	{
		$this->load->model('Users_Model');
		$this->load->model('Participation_Model');

		$fb_user = $this->facebook->request('get', '/me?fields=id,last_name,first_name,email');
		$bd_user = $this->Users_Model->get_users($fb_user);
		$bd_participation = $this->Participation_Model->get_participation($fb_user);

		if(isset($bd_user) && $bd_user->banni == "1")
		{
			echo "Vous etes banni !";
		}
		elseif($bd_participation)
		{
			$data['photo'] = $bd_participation->source_photo;
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('front_message/already_participated', $data);
			$this->load->view('footer');
		}
		elseif($photo_id != NULL)
		{
			if(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Oui")
			{
				if(is_null($bd_user))
				{
					$this->Users_Model->add_users($fb_user, $this->facebook->is_authenticated());
				}
				else
				{
					$this->Users_Model->update_users($fb_user, $this->facebook->is_authenticated());
				}
				$participation = $this->facebook->request('get', $photo_id . '?fields=images');
				$this->Participation_Model->add_participation($participation, $fb_user);

				$data['photo'] = $participation['images']['0']['source'];
				$this->load->view('header');
				$this->load->view('menu');
				$this->load->view('front_message/photo_added', $data);
				$this->load->view('footer');
			}
			elseif(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Non")
			{
				redirect('/participate');
			}
			else
			{
				$data['title'] = 'Participer avec cette photo ?';
				$data['input_name'] = 'addPhoto';
				$photo = $this->facebook->request('get', $photo_id . '?fields=images');
				$data['photo'] = $photo['images']['0']['source'];

				$this->load->view('header');
				$this->load->view('menu');
				$this->load->view('front_message/confirm', $data);
				$this->load->view('footer');
			}
		}
		else{

			$data['errors'] = isset($_SESSION['errors']) ? $_SESSION['errors'] : '';
			unset($_SESSION['errors']);

			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('upload', $data);
			$this->load->view('footer');
		}
	}


	public function album($album_id = NULL)
	{
		if($album_id == NULL)
		{
			$data['albums'] = $this->facebook->request('get', '/me/albums')['data'];

			foreach($data['albums'] as $index => $album)
			{
			// $cover = $this->facebook->request('get', $album['id'] . '/picture');  // Ne fonctionne pas ?
				$cover = $this->facebook->request('get', $album['id'] . '/photos');
				$cover = $this->facebook->request('get', $cover['data'][0]['id'] . '?fields=images');
				$cover = $cover['images'][0]['source'];

				$data['albums'][$index]['cover'] = $cover;
			}

			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('albums', $data);
			$this->load->view('footer');


		}
		else
		{
			$photos = $this->facebook->request('get', $album_id . '/photos?name')['data'];

			$data['photos'] = array();
			foreach ($photos as $photo) {
				$pic = $this->facebook->request('get', $photo['id'] . '?fields=images');
				array_push($data['photos'], $pic);
			}
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('photos', $data);
			$this->load->view('footer');

		}
	}

	public function add_photos()
	{
		if(!isset($_FILES['photo_file']   ))
		{
			if(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Oui")
			{
				$photo_upload = $this->facebook->user_upload_request('./uploads/uploaded_photos/' . $_POST['fileName'], ['message' => $_POST['fileDescription']]);

				unlink('./uploads/uploaded_photos/' . $_POST['fileName']);

				redirect('participate/index/' . $photo_upload['id']);
			}
			else
			{
				if(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Non")
				{
					unlink('./uploads/uploaded_photos/' . $_POST['fileName']);
					redirect('/participate');
				}
			}
		}
		else
		{
			$upload_config['upload_path'] = './uploads/uploaded_photos/';
			$upload_config['file_name'] = md5(uniqid()) . $_FILES["photo_file"]["name"];
			$upload_config['allowed_types'] = 'jpg|png';
			$upload_config['max_size'] = 8000;

			$this->load->library('upload', $upload_config);

			if (! $this->upload->do_upload('photo_file'))
			{
				$error = array('error' => $this->upload->display_errors());
				$_SESSION['errors'] = $error;
				redirect('/participate');
			}
			else
			{
				$uploaded_file_name = $this->upload->data('orig_name');
				$uploaded_file_description = $_POST['photo_description'];

				$data['photo'] = '/uploads/uploaded_photos/' . $uploaded_file_name;
				$data['title'] = 'Ajouter cette image sur votre compte ?';
				$data['input_name'] = 'addPhoto';
				$data['uploaded_file_name'] = $uploaded_file_name;
				$data['uploaded_file_description'] = $uploaded_file_description;

				$this->load->view('header');
				$this->load->view('menu');
				$this->load->view('front_message/confirm', $data);
				$this->load->view('footer');

			}
		}
	}


	public function delete()
	{
		$this->load->model('Participation_Model');

		$fb_user = $this->facebook->request('get', '/me?fields=id,last_name,first_name,email');
		$bd_participation = $this->Participation_Model->get_participation($fb_user);

		if(is_null($bd_participation)){ redirect('/'); }

		if(isset($_POST['deletePhoto']) && $_POST['deletePhoto'] == "Oui")
		{
			$bd_user = $this->Participation_Model->delete_participation($fb_user);
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('front_message/deleted');
			$this->load->view('footer');

		}
		elseif(isset($_POST['deletePhoto']) && $_POST['deletePhoto'] == "Non")
		{
			redirect('/');
		}
		else
		{

			$data['photo'] = $bd_participation->source_photo;

			$data['title'] = 'Supprimer la participation ?';
			$data['input_name'] = 'deletePhoto';

			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('front_message/confirm', $data);
			$this->load->view('footer');
		}
	}
}