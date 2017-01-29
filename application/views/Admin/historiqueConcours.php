<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
	<table class="listConcours container col-sm-12">
 		<tr class="ligneTableau ">
	 		<th>Identifiants</th>
	 		<th>Noms</th>
	 		<th>Dates de début</th>
			<th>Dates de fin</th>
			<th>Choix</th>
 		</tr>
 		

 		<?php
 		echo form_open('admin/modifConcours'); 

 			foreach ($liste as $row){

 				echo "<tr>";
					echo "<td>".$row->id."</td>";
					echo "<td>".$row->nom."</td>";
					echo "<td>".$row->date_debut."</td>";
					echo "<td>".$row->date_fin."</td>";
					echo "<td><button type='submit' name='modifConcours' class='button' value=".$row->id.">Modifier</button>";
                    echo "<td><button type='submit' name='adminConcours' class='button' value=".$row->id.">Administration</button>";
					echo "<td><button type='submit' name='supprConcours' class='button' value=".$row->id.">Supprimer</button>";
				echo "</tr>";

    		}?>

    	</form>
	</table>
