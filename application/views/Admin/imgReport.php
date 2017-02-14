
<table class="listConcours container">

    <?php
    foreach ($liste as $row){}


    if(!empty($liste))
    {

    ?>
    


    <form method="POST" action="../signalBan" Onsubmit="return alertConfirm();">


    <h1 class="h1_listUser">Images signalées</h1>

            <tr class="ligneTableau ">

             <th><label for='filter_img'>Image</label></th> 

             <th><label for='filter_surname'>Nom</label></th>

             <th><label for='filter_name'>Prénom</label></th>

             <th><label for='filter_email'>Email</label></th>

        </tr>

        


            <tr>
            
                <td><img src="<?php echo $row->source_photo; ?>" alt="image reporté"  width="150" height="150" /></td>
                <td><?php echo strtoupper($row->nom) ?></td>
                <td><?php echo ucfirst($row->prenom) ?></td>
                <td><?php echo $row->mail ?></td>

                <?php echo "<td><button type='submit' name='id_user_ban' class='button' value=".$row->id_fb.">Bannir et supprimer la photo</button></td>";

                

            echo "</tr>";?>

       

    </form> 


    <?php

    }

    else{

        echo "<h1 id='imgSign'>Il n'y a pas d'image signalée</h1>";
    }

    ?>


</table>