<?php 
	session_start();
	require_once __DIR__ . '/vendor/autoload.php'; 

	$fb = new Facebook\Facebook([
		  'app_id' => '153288038468111',
		  'app_secret' => '067a4c0d84616df2f643f78293079162',
		  'default_graph_version' => 'v2.5',
		]);

	$helper = $fb->getRedirectLoginHelper();

	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if(isset($accessToken)){
		$_SESSION["ACCESS_TOKEN"] = (string) $accessToken;
	}else{
		unset($_SESSION["ACCESS_TOKEN"]);
	}

	header("Location: /");
?>












