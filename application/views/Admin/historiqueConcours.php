<?php echo form_open('Admin/export_concours_CSV'); ?> 


<input type="submit" value="Exporter" name="export"  class='button' id="exportConcours"/>

</form>



<table class="listConcours container">

        <?php
        echo form_open('admin/rechercheConcours');
        ?>
            <tr class="ligneTableau ">

                 <th><label for='filter_id'>Identifiants</label></th>       

                 <th><label for='filter_name'>Noms</label></th>

                 <th><label for='filter_date_deb'>Dates de début</label></th>

                 <th><label for='filter_date_fin'>Dates de fin</label></th>
            </tr>

            <tr>
                
                <td><input type='text' name='filter_id' class="form-control" 
                    value="<?php echo set_value('filter_id', $this->session->userdata('current_client')); ?>" /></td>

                <td><input type='text' name='filter_name' class="form-control" 
                value="<?php echo set_value('filter_name', $this->session->userdata('current_client')); ?>" /></td>

                <td><input type='text' name='filter_date_deb' class="form-control" 
                value="<?php echo set_value('filter_date_deb', $this->session->userdata('current_client')); ?>" /></td>

                <td><input type='text' name='filter_date_fin' class="form-control" 
                value="<?php echo set_value('filter_date_fin', $this->session->userdata('current_client')); ?>" /></td>

                <td><input type='submit' value="Filtrer"  class='button' /></td>

            </tr>

        </form>


		<form method="POST" action="modifConcours">


		<?php

			foreach ($liste as $row){

				echo "<tr>";
				echo "<td>".$row->id."</td>";
				echo "<td>".$row->nom."</td>";
				echo "<td>".$row->date_debut."</td>";
				echo "<td>".$row->date_fin."</td>";


				// Si le concours est fini, on n'affiche pas le bouton modifier
				if ($row->date_fin > date("Y-m-d"))
				{
				echo "<td><button type='submit' name='modifConcours' class='button' value=".$row->id.">Modifier</button></td>";

				}

				else
				{
				echo "<td></td>";
				}

				echo "<td><button type='submit' name='supprConcours'  class='button' value=".$row->id." Onclick='return alertConfirm();'>Supprimer</button></td>";
			echo "</tr>";

		}?>

	</form>
</table>
