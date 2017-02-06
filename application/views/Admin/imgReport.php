
<table>
    
    <h1>Images signalées</h1>


    <?php
    echo form_open('admin/signalBan'); 
    ?>

            <tr>

             <th><label for='filter_img'>Image</label></th> 

             <th><label for='filter_surname'>Nom</label></th>

             <th><label for='filter_name'>Prénom</label></th>

             <th><label for='filter_email'>Email</label></th>

        </tr>

        
        <?php
        foreach ($liste as $row){?>

            <tr>
            
                <td><img src="<?php echo $row->source_photo; ?>" alt="image reporté"  width="150" height="150" /></td>
                <td><?php echo $row->nom ?></td>
                <td><?php echo $row->prenom ?></td>
                <td><?php echo $row->mail ?></td>

                <?php echo "<td><button type='submit' name='id_user_ban' value=".$row->id_fb.">Bannir et supprimer la photo</button></td>";

                

            echo "</tr>";

        }?>

    </form> 


</table>