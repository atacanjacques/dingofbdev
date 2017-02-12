<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="section-albums">
    <div class="container text-center">
        <h1 style="font-size: 31px; font-weight: 700;">Vos Albums</h1>
        <div class="row">

            <?php
            foreach ($albums as $album) {
                echo '<ul>';
                echo '<li><a class="button" href="/participate/album/' . $album['id'] . '">' . $album['name'] . '</a></li>';
                echo '</ul>';
            }
            ?>


        </div>
    </div>

</section>

