</section>
<section id="section-galerie">
    <div class="container">
        <div id="main_area">
            <h1>Albums :  </h1>
            <div class="row">
                <div class="col-sm-12" id="slider-thumbs">

                    <ul class="hide-bullets">
                       <?php
                       foreach($photos as $photo)
                       {
                        ?>
                        <li class="col-sm-4 col-xs-12">
                            <a href="/participate/index/<?php echo $photo['id']; ?>">
                            <img src="<?php echo $photo['images'][0]['source']; ?>" class="photo_gallery">
                            </a>
                                <p class="title-photo"></p>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>