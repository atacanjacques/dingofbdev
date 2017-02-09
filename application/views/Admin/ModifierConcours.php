<?php
    foreach ($liste as $row)
    {

    $row->id_concours;
    $row->nom_concours;
    $row->date_debut;
    $row->date_fin;
    $row->accueil;
    $row->reglement;
    $row->nom_lot;
    $row->url;
    $row->description;

    }

?>

<div class="creation_concours container">
        <h1 style="font-size: 31px; font-weight: 700;">Créez un concours</h1>

        <?php
            echo form_open('admin/editConcours'); 
            echo validation_errors();
         ?>
                    <input type="hidden" name="id_concours" value="<?php echo $row->id_concours; ?>" />

                <div class="form-group">
                    <label for="name_competition">Nom du concours : </label>
                    <input type="text" class="form-control" placeholder="Nom" name="name_competition" value="<?php echo $row->nom_concours; ?>" />
                </div>


                <div class="form-group">
                    <label for="date_START">Date de début : </label>
                    <input type="text" class="form-control" id="date_START"
                           placeholder="JJ/MM/YYYY hh:mm" name="date_START" 
                           value="<?php echo $row->date_debut; ?>" />
                </div>

                <div class="form-group">
                    <label for="heure_START">Heure de début : </label>
                    <input type="text" name="heure_START" id="heure_START" class="form-control" value="<?php echo $row->heure_debut; ?>" />
                </div>

                <div class="form-group">
                    <label for="date_END">Date de fin : </label>
                    <input type="text" class="form-control" id="date_END"
                           placeholder="JJ/MM/YYYY hh:mm" name="date_END" 
                           value="<?php echo $row->date_fin; ?>" />
                </div>

                <div class="form-group">
                    <label for="heure_END">Heure de fin : </label>
                    <input type="text" class="form-control" id="heure_END" name="heure_END" 
                    value="<?php echo $row->heure_fin; ?>" />
                </div>

            

            <h1 style="font-size: 31px; font-weight: 700; text-align: center">Création des
                pages</h1>


                <div class="form-group">
                    <label for="create_accueil">Page d'accueil du concours : <br /></label>
                    <textarea name="create_accueil" id="create_accueil" cols="30" rows="10"><?php echo $row->accueil; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="name_lot">Nom du lot à gagner : </label><br />
                    <input type="text" class="form-control" name="name_lot" 
                    value="<?php echo $row->nom_lot; ?>"/><br />

                    <label for="img_lot">Image du lot : </label><br />

                    <img src="<?php echo $row->url; ?>" alt="<?php echo $row->nom_lot; ?>"  width="150" height="150" />

                    <input type="file" name="img_lot" 
                    value="<?php echo $row->url; ?>" /><br />

                    <label for="create_lot">Description du lot : <br /></label>
                    <textarea name="create_lot" cols="30" rows="10"><?php echo $row->description; ?></textarea>
                </div> 

                <div class="form-group">
                    <label for="create_rules">Page Régles : <br /></label>
                    <textarea name="create_rules" id="create_rules" cols="30" rows="10"><?php echo $row->reglement; ?></textarea>
                </div>
                <div class="choix_template">
                    <label for="template">Choisir une template </label><br />
                    <select name="template">
                      <option value="theme1">Thème 1</option>
                      <option value="theme2">Thème 2</option>
                      <option value="theme3">Thème 3</option>
                    </select>
                </div>
                <div class="validation_concours">
                    <input type="submit" name="validation_concours" class="button btn" value="Valider" />
                </div>

        </form>
    
    </div>

</section>
























