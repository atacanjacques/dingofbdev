<?php
    foreach ($liste as $row){

    $row->participation_idparticipation;
    $row->nom;
    $row->source_photo;
    $row->prenom;

    }
?>

<div id="gagnant">

<h1>Le gagnant est : <?php echo $row->nom; echo" ".$row->prenom;?></h1>
	<img src="<?php echo $row->source_photo; ?>" alt="photo du gagnant" id="img_gagnant" width="280" height="280" />
	<img src="<?php echo base_url('assets/img/podium.png'); ?>" alt="podium" id="podium" /> 
</div>