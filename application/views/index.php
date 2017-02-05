<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- BLOC 1 -->
<section id="section-accueil">
	<div class="container">
		<p>
			<?php
			if(isset($permissionsMissing))
			{
				echo '<div class="alert alert-warning" role="alert">';
				echo 'Erreur de connexion.<br>';
				echo 'Il vous manque les droits suivant:<br>';
				foreach ($permissionsMissing['permissions'] as $permission)
				{
					echo $permission . ' : ' . $permissionsMissing['info'][$permission] . '<br>';
				}
				if($permissionsMissing['refusedPage'] == "vote")
				{
					echo '<a href="/login/loginVote" class="button">REESSAYER</a>';
				}
				elseif($permissionsMissing['refusedPage'] == "participate")
				{
					echo '<a href="/login/loginParticipate" class="button">REESSAYER</a>';
				}
				echo '</div>';

			}
			?>
		</p>
		<h1 style="font-size: 31px; text-align: center; font-weight: 700">JEU CONCOURS !</h1>
		<div class="row">

			<div class="col-sm-12 col-xs-12 text-center" id="description" >
				<p>Du 1er au 15 janvier</p>
				<p>A l'occassion du Mondial du Tatouage</p>
				<p>Montre ton plus tatouage en photo</p>
				<p>Pour tenter de gagner</p>
				<p>Un tatouage et des pass gratuits pour le Mondial du tatouage</p>
				<a href="/login/loginVote" class="button">VOTER</a>
				<a href="/login/loginParticipate" class="button">PARTICIPER</a>
			</div>
		</div>
	</div>
</section>