<!-- CONTENT -->
<section id="section-galerie">

    <div class="container">
        <div id="main_area">
            <!-- Slider -->
            <h1>Galerie Photos </h1>
            <p>
                Order by :
                <br>
                <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                <a href="/vote/index/rand/<?php echo $page; ?>">Random</a>

                <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                <a href="/vote/index/top/<?php echo $page; ?>">Top</a>
            </p>

            <div class="row">
                <div class="col-sm-12" id="slider-thumbs">
                    <!-- Bottom switcher of slider -->
                    <ul class="hide-bullets">
                        <?php
                        foreach($liste_participation as $participation)
                        {
                            ?>
                            <li class="col-sm-4 col-xs-6">
                                <a class="thumbnail" id="carousel-selector-0">
                                    <img src="<?php echo $participation->source_photo; ?>">
                                </a>
                                <p class="title-photo"><?php echo $participation->prenom; ?></p>
                                <p class="title-photo"><?php echo $participation->votes; ?></p>
                                <p class="title-photo">
                                <button type="button" class="btn btn-success btn-sm" onclick="location.href='/vote/add_vote/<?php echo $participation->id . '/'; ?>'"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Voter</button>
                                <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon glyphicon-share-alt" aria-hidden="true"></span> Partager</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="location.href='/vote/add_signalement/<?php echo $participation->id; ?>'"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span></button>
                                </p>
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
                                <a href="/vote/index/<?php echo $orderby . '/' . $page-1 < 1 ? $page : $page-1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php
                            for ($i=1; $i <= $nb_participation; $i++)
                            {
                                $active = $i == $page ? ' class="active"' : '';
                                echo '<li' . $active . '><a href="/vote/index/' . $orderby . '/' . $i . '">' . $i . '</a></li>';
                            }
                            ?>
                            <li>
                                <a href="/vote/index/<?php echo $orderby . '/' . $page+1 > $page ? $page : $page+1; ?>" aria-label="Next">
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