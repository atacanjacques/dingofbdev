<?php echo form_open('admin/export_concours_CSV'); ?> 


<input type="submit" value="exporter" name="export" />

</form>



<table>
    
        <h1>Filtrer les concours:</h1>

        <?php
        echo form_open('admin/rechercheConcours');
        ?>
            <tr>

                 <th><label for='filter_id'>ID</label></th>       

                 <th><label for='filter_name'>Nom</label></th>

                 <th><label for='filter_date_deb'>Date de début</label></th>

                 <th><label for='filter_date_fin'>Date de fin</label></th>
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

                <td><input type='submit' value="Filtrer" /></td>

            </tr>

        </form>

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
