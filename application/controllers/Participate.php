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
			echo "Vous avez deja participer !";
			echo '<br><a href="/participate/delete">Supprimer ma participation</a>';
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

				echo '<h1>IMAGE AJOUTE</h1>';
				echo '<p>Partager votre participation : </p>';
				echo '<img src="' . $participation['images']['0']['source'] . '"/>';
			}
			elseif(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Non")
			{
				redirect('/participate');
			}
			else
			{
				echo '
				Participer avec cette photo ?<br>
				<form action="" method="post">
					<input type="submit" value="Oui" name="addPhoto">
					<input type="submit" value="Non" name="addPhoto">
				</form>
				';

			}
		}
		else{
			echo '<a href="/participate/album">mes albums</a>';
			echo '<br><a href="/participate/add_photos">ajouter image fb</a>';
		}
	}


	public function album($album_id = NULL)
	{
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
		if(!isset($_FILES['photo_file']   ))
		{
			if(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Oui")
			{
				echo "<h1>Photo ajouté !</h1>";
				$photo_upload = $this->facebook->user_upload_request('./uploads/uploaded_photos/' . $_POST['fileName'], ['message' => $_POST['fileDescription']]);

				unlink('./uploads/uploaded_photos/' . $_POST['fileName']);

				redirect('participate/index/' . $photo_upload['id']);
			}
			else
			{
				if(isset($_POST['addPhoto']) && $_POST['addPhoto'] == "Non")
				{
					unlink('./uploads/uploaded_photos/' . $_POST['fileName']);

				}
				echo '
				<form action="" method="post" enctype="multipart/form-data">
					<input type="file" name="photo_file"><br>
					<textarea name="photo_description">' . 'Ma participation au concours ' . date('d-m-Y H:i:s') . '</textarea>
					<input type="submit" value="Ajouter à mes photos" name="submit">
				</form>
				';
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
				var_dump($error);
			}
			else
			{
				$uploaded_file_name = $this->upload->data('orig_name');
				$uploaded_file_description = $_POST['photo_description'];

				echo '<img src="/uploads/uploaded_photos/' . $uploaded_file_name . '" />';
				echo "<h1>Ajouté cette image sur votre compte ?</h1>";
				echo '
				<form action="" method="post">
					<input type="hidden" value="' . $uploaded_file_name . '" name="fileName">		

					<input type="hidden" value="' . $uploaded_file_description . '" name="fileDescription">

					<input type="submit" value="Oui" name="addPhoto">
					<input type="submit" value="Non" name="addPhoto">
				</form>
				';
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
			echo "participation supprimer";

		}
		elseif(isset($_POST['deletePhoto']) && $_POST['deletePhoto'] == "Non")
		{
			redirect('/');
		}
		else
		{
			echo '
			Supprimer la participation ?
			<form action="" method="post">
				<input type="submit" value="Oui" name="deletePhoto">
				<input type="submit" value="Non" name="deletePhoto">
			</form>
			';
		}
	}
}