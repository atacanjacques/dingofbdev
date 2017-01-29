<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<table>
 		<tr>
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


					// Si le concours est fini, on n'affiche pas le bouton modifier
					if ($row->date_fin > date("Y-m-d"))
					{
					echo "<td><button type='submit' name='modifConcours' value=".$row->id.">Modifier</button></td>";

					}

					else
					{
					echo "<td></td>";
					}

					echo "<td><button type='submit' name='supprConcours' value=".$row->id.">Supprimer</button></td>";
				echo "</tr>";

    		}?>

    	</form>
	</table>
