<?php 
	session_start();
	require_once __DIR__ . '/vendor/autoload.php'; 

	$fb = new Facebook\Facebook([
		  'app_id' => '1156257917791729',
		  'app_secret' => '963626bb1b3ba01ba5346ac75f1e47dc',
		  'default_graph_version' => 'v2.5',
		]);

	$helper = $fb->getRedirectLoginHelper();
	$scope = ['email', 'user_likes'];
	$loginUrl = $helper->getLoginUrl('http://vag.fbdev.fr/login-callback.php', $scope);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Se connecter a FB</title>
    <script type="text/javascript" src="public/js/jquery-3.1.1.min.js"></script>
    <!--<script type="text/javascript" src="public/js/script.js"></script>-->
</head>
<body>
	<h1>Se connecter</h1>

	<a href='<?php echo $loginUrl;?>'>Se connecter</a>

	<!--
	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button>
	

	<button id="subscribe">Se connecter</button>
	<button id="disconnect">Se déconnecter</button>

	<div id="status"></div>

	-->

</body>
</html>