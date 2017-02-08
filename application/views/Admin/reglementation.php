<?php

foreach ($liste as $row)
{

$row->cgu;
$row->mentions_legales;

}



echo form_open('admin/editAdministration'); 
?>

    <div class="form-group">
        <label for="cgu">Conditions générales d'utilisation : </label>

        <textarea name="cgu" cols="30" rows="10"><?php echo $row->cgu; ?></textarea>
    </div>


    <div class="form-group">
        <label for="mentions_legales">Mentions Légales : </label>

        <textarea name="mentions_legales" cols="30" rows="10"><?php echo $row->mentions_legales; ?></textarea>
    </div>

    <div class="validation_concours">
        <input type="submit" name="validation_concours" class="button btn" value="Enregistrer les modifications" />
    </div>


</form>
