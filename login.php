<?php 
	session_start();
	require_once __DIR__ . '/vendor/autoload.php'; 

	$fb = new Facebook\Facebook([
		  'app_id' => '153288038468111',
		  'app_secret' => '067a4c0d84616df2f643f78293079162',
		  'default_graph_version' => 'v2.5',
		]);

	$helper = $fb->getRedirectLoginHelper();
	$scope = ['email', 'user_likes'];
	$loginUrl = $helper->getLoginUrl('http://dingo.fbdev.fr/login-callback.php', $scope);


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