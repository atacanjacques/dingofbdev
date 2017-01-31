
<table>
    <tr>
        <th>ID</th>
        <th>nom</th>
        <th>prenom</th>
        <th>mail</th>
        <th>token</th>
        </tr>


        <?php
        echo form_open('admin/bannirUser'); 

            foreach ($liste as $row){

                echo "<tr>";
                    echo "<td>".$row->id_fb."</td>";
                    echo "<td>".$row->nom."</td>";
                    echo "<td>".$row->prenom."</td>";
                    echo "<td>".$row->mail."</td>";
                    echo "<td>".$row->token."</td>";
                    echo "<td>".$row->banni."</td>";

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