

<table class="listConcours container">
    
    <h1 class="h1_listUser">Filtrer votre recherche:</h1>



<?php echo form_open('admin/export_users_CSV'); ?>


    <input type="submit" value="Exporter" name="export" class='button h1_listUser' />

</form>




    <?php
    echo form_open('admin/rechercheUser');
    ?>
        <tr class="ligneTableau ">

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

            <td><input type='submit' value="Filtrer"  class='button'/></td>

        </tr>

    </form>


    <form method="POST" action="bannirUser" Onsubmit="return alertConfirm();">

    <?php

        foreach ($liste as $row){

            echo "<tr>";
                echo "<td>".$row->id_fb."</td>";
                echo "<td>".strtoupper($row->nom)."</td>";
                echo "<td>".ucfirst($row->prenom)."</td>";
                echo "<td>".$row->mail."</td>";

                if ($row->banni == '0')
                {
                    echo "<td><button type='submit' name='id_user_ban'  class='button' value=".$row->id_fb.">Bannir</button></td>";
                }

                else
                {
                    echo "<td><button type='submit' name='id_user_reint' class='button' value=".$row->id_fb.">Réintégrer</button></td>";
                }
                

            echo "</tr>";

        }?>

    </form> 


</table>