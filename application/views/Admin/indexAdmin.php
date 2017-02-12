<?php
    foreach ($liste as $row){
    }


// Calcul du nombre de jours restant
$date_ajd = strtotime(date('Y-m-d'));

$date_fin = strtotime($row->date_fin);

$nbJoursTimestamp = $date_fin - $date_ajd;

$nbJours = $nbJoursTimestamp/86400;


if ($nbJours < 0 ){
	$nbJours = "Concours terminé";
	$title_gagnant = "Gagnant :";

}

else{

	$nbJours = "Temps restant : ".$nbJours." jours";
	$title_gagnant = "Photo en tête du classement";
}


?>


<!-- CONTENT -->
<section id="section-galerie">

    <div class="container">
        <div id="main_area">
            <!-- Slider -->
            <!-- <h1>Nombre de participants : </h1> -->
            <h1><?php echo $nbJours; ?></h1>
            <h1><?php echo $title_gagnant; ?></h1>
            <div class="row">
                <div class="col-sm-12" id="slider-thumbs">

 					<ul class="hide-bullets">

                        <li class="top_user">

							<a class="thumbnail slide" id="carousel-selector-3"><img src="<?php echo $row->source_photo; ?>" alt="photo du gagnant" id="img_gagnant" width="430" height="430" /></a>

							<p class="title-photo"><?php echo strtoupper($row->nom); echo" ".ucfirst($row->prenom);?></p>

						</li>

					</ul>

				</div>

            </div>

        </div>
    </div>
</section>