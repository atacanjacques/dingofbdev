<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participate extends MY_Controller {

	public function index($photo_id = NULL)
	{
		$this->output->enable_profiler(TRUE);

		if($photo_id != NULL){
			$this->load->model('Participation_Model');

			$choice = $this->facebook->request('get', $photo_id . '?fields=images,id');
			$photo_source = $choice['images'][0]['source'];
			$user_id = $choice['id'][0];

			echo '<h1>IMAGE AJOUTE</h1>';
			echo '<img src="' . $photo_source . '"/>';
			$this->Participation_Model->insert_participation($photo_source, $user_id);
		}
		else{
			echo '<a href="/participate/album">mes albums</a>';
			echo '<br><a href="/participate/add_photos">ajouter image fb</a>';
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
			$photos = $this->facebook->request('get', $album_id . '/photos')['data'];

			$data['photos'] = array();
			foreach ($photos as $photo) {
				$pic = $this->facebook->request('get', $photo['id'] . '?fields=images');
				array_push($data['photos'], $pic);
			}
			$this->load->view('photos', $data);

		}
	}

	public function add_photos()
	{
		$this->output->enable_profiler(TRUE);

		if(!isset($_FILES['photo_file']   ))
		{
			if(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Oui")
			{
				echo "<h1>Photo ajouté !</h1>";
				$photo_upload = $this->facebook->user_upload_request('tmp/uploaded_photos/' . $_POST['fileName'], ['message' => 'Ma participation au concours' . date('d-m-Y H:i:s')]);

				// unlink('tmp/uploaded_photos/' . $_POST['fileName']);

				redirect('participate/index/' . $photo_upload['id']);
			}
			else
			{
				if(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Non")
				{
					// unlink('tmp/uploaded_photos/' . $_POST['fileName']);

				}
				echo '
				<form action="" method="post" enctype="multipart/form-data">
					<input type="file" name="photo_file"><br>
					<input type="submit" value="Ajouter à mes photos" name="submit">
				</form>
				';
			}
		}
		else
		{
			$upload_config['upload_path'] = 'tmp/uploaded_photos/';
			$upload_config['file_name'] = md5(uniqid()) . $_FILES["photo_file"]["name"];
			$upload_config['allowed_types'] = 'jpg|png';
			$upload_config['max_size'] = 8000;

			$this->load->library('upload', $upload_config);

			if (! $this->upload->do_upload('photo_file'))
			{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			}
			else
			{
				$uploaded_file_name = $this->upload->data('orig_name');

				echo '<img src="/tmp/uploaded_photos/' . $uploaded_file_name . '" />';
				echo "<h1>Ajouté cette image ?</h1>";
				echo '
				<form action="" method="post">
					<input type="hidden" value="' . $uploaded_file_name . '" name="fileName">
					<input type="submit" value="Oui" name="addPhoto">
					<input type="submit" value="Non" name="addPhoto">
				</form>
				';
			}
		}
	}
}

// TODO :
// - Confirmation ajout image depuis facebook
// - Commentaire + verif champs
// - Model ajout user en plus de la participation