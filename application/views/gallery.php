<!-- CONTENT -->
<section id="section-galerie">

    <div class="container">
        <div id="main_area">
            <!-- Slider -->
            <h1>Galerie Photos </h1>
            <div class="row">
                <div class="col-sm-12" id="slider-thumbs">
                    <div class="tri_gallery">
                        <label for="">Triez Par :</label>
                        <select name="template">
                            <option value="theme1">Nouveautés</option>
                            <option value="theme2">Nombre de votes</option>
                            <option value="theme3">Ancienneté</option>
                        </select>
                    </div>
                    <!-- Bottom switcher of slider -->
                    <ul class="hide-bullets">
   <?php
                           foreach($liste_participation as $participation)
                        {
                            ?>
                        <li class="col-sm-4 col-xs-12">
                            <a title=" " class="thumbnail slide fancybox" data-nbvote="<?php echo $participation->votes; ?>" data-vote="/vote/add_vote/<?php echo $participation->id; ?>" data-signalement="/vote/add_signalement/<?php echo $participation->id; ?>" rel="group" href="<?php echo $participation->source_photo; ?>" id="carousel-selector-3">
                                <img src="<?php echo $participation->source_photo; ?>" class="photo_gallery"></a>
                            <p class="title-photo"><?php echo $participation->prenom; ?></p>
                        </li>



                            <?php
                        }
                        ?>

                    </ul>

                    <div class="text-center col-sm-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>