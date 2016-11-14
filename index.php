<?php 
    session_start();
    require_once __DIR__ . '/vendor/autoload.php'; 

    $fb = new Facebook\Facebook([
          'app_id' => '153288038468111',
          'app_secret' => '067a4c0d84616df2f643f78293079162',
          'default_graph_version' => 'v2.5',
        ]);

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script type="text/javascript" src="public/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="public/js/script.js"></script>
    </head>
    <body>
        <h1>Projet Facebook 1</h1>

        <?php if(isset($_SESSION["ACCESS_TOKEN"])) :?>

            <a href="logout.php">Se déconnecter</a>

            <?php
                
                $fb->setDefaultAccessToken($_SESSION["ACCESS_TOKEN"]);

                try {

                  $response = $fb->get('/me');
                  $userNode = $response->getGraphUser();

                } catch(Facebook\Exceptions\FacebookResponseException $e) {
                  // When Graph returns an error
                  echo 'Graph returned an error: ' . $e->getMessage();
                  exit;
                } catch(Facebook\Exceptions\FacebookSDKException $e) {
                  // When validation fails or other local issues
                  echo 'Facebook SDK returned an error: ' . $e->getMessage();
                  exit;
                }

                echo 'Logged in as ' . $userNode->getName();

            ?>




        <?php else: ?>

            <a href="login.php">Veuillez vous connecter à facebook</a>

        <?php endif;?>
        

    </body>
</html>