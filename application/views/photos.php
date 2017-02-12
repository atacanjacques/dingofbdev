<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="section-photos">
    <div class="container">
        <h1 style="font-size: 31px; font-weight: 700;">Vos Photos</h1>
        <div class="row">

            <?php
            foreach ($photos as $photo) {
                echo '<a href="/participate/index/' . $photo['id'] . '"><span style="width:100px;height:100px;display:inline-block;background-size:cover;background-image:url(' . $photo['images'][0]['source'] . ');"></span></a>';
            }
            ?>


        </div>
    </div>

</section>
