<section id="section-accueil">
    <div class="container">
        <p>
            <?php
            if(isset($permissionsMissing))
            {
                echo '<div class="alert alert-warning" role="alert">';
                echo 'Erreur de connexion.<br>';
                echo 'Il vous manque les droits suivant:<br>';
                foreach ($permissionsMissing['permissions'] as $permission)
                {
                    echo $permission . ' : ' . $permissionsMissing['info'][$permission] . '<br>';
                }
                echo '</div>';

            }
            ?>
        </p>
        <h1 style="font-size: 31px; text-align: center; font-weight: 700">JEU CONCOURS !</h1>
        <div class="row">

            <div class="col-sm-12 col-xs-12 text-center" id="description">
                <?php

                echo $concours->accueil;

                if((isset($permissionsMissing) && $refusedPage == 'vote') || !$this->facebook->is_authenticated())
                {
                   echo '<button class="button buttonLogin">LOGIN</button>';
               }
               else
               {
                echo '<a href="/login/loginVote" class="button buttonVote">VOTER</a>';
            }   

            if((isset($permissionsMissing) && $refusedPage == 'participate') || !$this->facebook->is_authenticated())
            {
               echo '<button class="button buttonParticipate">PARTICIPER</button>';
           }
           else
           {
            echo '<a href="/login/loginParticipate" class="button buttonVote">PARTICIPER</a>';
        }   

        ?>
    </div>
</div>
</div>
</section>