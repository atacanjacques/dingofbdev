<?php echo form_open('admin/export_users_CSV'); ?>


    <input type="submit" value="exporter" name="export" />

</form>


<table>
    
    <h1>Filtrer votre recherche:</h1>

    <?php
    echo form_open('admin/rechercheUser');
    ?>
        <tr>

             <th><label for='filter_id'>ID</label></th>       

             <th><label for='filter_surname'>Nom</label></th>

             <th><label for='filter_name'>Prénom</label></th>

             <th><label for='filter_name'>Email</label></th>

        </tr>

        <tr>
            
            <td><input type='text' name='filter_id' class="form-control" 
                value="<?php echo set_value('filter_id', $this->session->userdata('current_client')); ?>" /></td>

            <td><input type='text' name='filter_surname' class="form-control" 
            value="<?php echo set_value('filter_surname', $this->session->userdata('current_client')); ?>" /></td>

            <td><input type='text' name='filter_name' class="form-control" 
            value="<?php echo set_value('filter_name', $this->session->userdata('current_client')); ?>" /></td>

            <td><input type='text' name='filter_email' class="form-control" 
            value="<?php echo set_value('filter_email', $this->session->userdata('current_client')); ?>" /></td>

            <td><input type='submit' value="Filtrer" /></td>

        </tr>

    </form>


    <?php

    echo form_open('admin/bannirUser'); 

        foreach ($liste as $row){

            echo "<tr>";
                echo "<td>".$row->id_fb."</td>";
                echo "<td>".$row->nom."</td>";
                echo "<td>".$row->prenom."</td>";
                echo "<td>".$row->mail."</td>";

                if ($row->banni == '0')
                {
                    echo "<td><button type='submit' name='id_user_ban' value=".$row->id_fb.">Bannir</button></td>";
                }

                else
                {
                    echo "<td><button type='submit' name='id_user_reint' value=".$row->id_fb.">Réintégrer</button></td>";
                }
                

            echo "</tr>";

        }?>

    </form> 


</table>