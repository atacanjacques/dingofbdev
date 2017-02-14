<?php

foreach ($liste as $row)
{

}



echo form_open('admin/editAdministration'); 
?>

    <div class="form-group">
        <label for="cgu" class="label_moder">Conditions générales d'utilisation : </label>

        <textarea name="cgu" cols="30" rows="10"><?php echo $row->cgu; ?></textarea>
    </div>


    <div class="form-group">
        <label for="mentions_legales" class="label_moder">Mentions Légales : </label>

        <textarea name="mentions_legales" cols="30" rows="10" class="textare"><?php echo $row->mentions_legales; ?></textarea>
    </div>

    <div class="validation_concours">
        <input type="submit" name="validation_concours" class="button btn label_moder" value="Enregistrer les modifications" />
    </div>


</form>
