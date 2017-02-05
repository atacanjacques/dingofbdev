<!-- CONTENT -->
<section id="section-galerie">

    <div class="container">
        <div id="main_area">
            <!-- Slider -->
            <h1>Galerie Photos </h1>
            <div class="row">
                <div class="col-sm-12" id="slider-thumbs">
                    <!-- Bottom switcher of slider -->
                    <ul class="hide-bullets">
                        <?php
                        foreach($participations as $participation)
                        {
                            ?>
                            <li class="col-sm-4 col-xs-6">
                                <a class="thumbnail" id="carousel-selector-0">
                                    <img src="<?php echo $participation->source_photo; ?>">
                                </a>
                                <p class="title-photo"><?php echo $participation->prenom; ?></p>
                                </li>
                            <?php
                        }
                        ?>

                    </li>
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