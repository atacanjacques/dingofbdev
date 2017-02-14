<section id="section-galerie">

    <div class="container">
        <div id="main_area">
            <!-- Slider -->
            <h1>Galerie Photos </h1>
            <div class="row">
                <div class="col-sm-12" id="slider-thumbs">

                    <ul class="hide-bullets">
                     <?php
                     foreach($albums as $album)
                     {
                        ?>
                        <li class="col-sm-4 col-xs-12">
                            <a href="<?php echo '/participate/album/' . $album['id']; ?>">
                                <img src="sdfgdsfgdfsg" class="photo_gallery"></a>
                                <p class="title-photo"><?php echo $album['name']; ?></p>
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