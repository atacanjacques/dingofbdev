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
                        <select name="template" onChange="window.document.location.href=this.options[this.selectedIndex].value;">
                            <option value="/vote/index/rand/<?php echo $page; ?>" <?php echo $orderby == 'rand' ? 'selected' : ''; ?> >Aléatoire</option>
                            <option value="/vote/index/top/<?php echo $page; ?>" <?php echo $orderby == 'top' ? 'selected' : ''; ?> >Nombre de votes</option>
                        </select>
                    </div>
                    <!-- Bottom switcher of slider -->
                    <ul class="hide-bullets">
                     <?php
                     foreach($liste_participation as $participation)
                     {
                        ?>
                        <li class="col-sm-4 col-xs-12">
                        <?php $vote_action = in_array($participation->id, $voted_participant) ? 'delete_vote' : 'add_vote'; ?>
                            <a title=" " class="thumbnail slide fancybox" data-caption="<?php echo $participation->prenom; ?>" data-nbvote="<?php echo $participation->votes; ?>" data-vote="/vote/<?php echo $vote_action . '/' . $participation->id; ?>"
                            data-action="<?php echo $vote_action; ?>" data-signalement="/vote/add_signalement/<?php echo $participation->id; ?>" rel="group" href="<?php echo $participation->source_photo; ?>" id="carousel-selector-3">
                                <img src="<?php echo $participation->source_photo; ?>" class="photo_gallery"></a>
                                <p class="title-photo"><?php echo $participation->prenom; ?></p>
                            </li>

                            <?php
                        }
                        ?>

                    </ul>

                    <?php
                    if($nb_participation > 1)
                    {
                        ?>
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
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>