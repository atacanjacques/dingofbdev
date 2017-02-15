<header>
    <div id="menu_white_background" class="navbar">
        <div class="structure">
            <nav>
                <div id="contener_type">
                    <a class="button_type" href="<?php echo site_url('home/index') ?>">Accueil</a>
                    <a class="button_type" href="<?php echo site_url('/login/loginVote') ?>">Galerie</a>
                    <a class="button_type" href="<?php echo site_url('home/price') ?>">Prix</a>
                    <a class="button_type buttonShareMenu" href="#">Partager</a>
                </nav>
            </div>
        </div>
    </header>
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
            $('.buttonShareMenu').click(function(e){
                e.preventDefault;
                FB.ui({
                  method: 'feed',
                  link: top.location.href,
                  caption: '<?php echo $caption; ?>',
              }, function(response){});
            });
        })

    </script>