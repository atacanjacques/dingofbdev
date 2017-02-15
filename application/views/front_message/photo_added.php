<section id="section-upload">
  <div class="container">
    <h1 style="font-size: 31px; font-weight: 700;text-align: center;">Participation validé !</h1>
    <div class="row">
      <div class="col-xs-12 col-sm-12">

        <div class="row">
          <div class="col-sm-12 col-xs-12 text-center">

            <p><img src="<?php echo $photo; ?>" class="photo_gallery"></p>

            <a href="/" class="button">Aller à l'accueil</a>
            <a href="#" class="button buttonShareParticipation">Partager sur Facebook</a>
    <?php
    $this->load->model('Concours_Model');
    $concours = $this->Concours_Model->date_concours();

    if($concours)
    {
        $caption = 'Vient jouer au jeu concours "' . $concours->nom . '"';
    }
    else
    {
        $caption = 'Tente ta chance au prochain concours ! ';
    }
    ?>

            <script>
              $(document).ready(function(){
                $('.buttonShareParticipation').click(function(e){
                  e.preventDefault;
                  FB.ui({
                    method: 'feed',
                    link: top.location.href,
                    picture: '<?php echo $photo; ?>',
                    caption: 'Je participe au concours <?php echo $caption; ?> ! Vote pour moi !',
                  }, function(response){});
                });
              })

            </script>
          </div>
        </div>


      </div>
    </div>
  </div>

</section>