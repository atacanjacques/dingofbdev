<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- CONTENT -->
<!-- BLOC 1 -->
<section id="section-accueil" xmlns="http://www.w3.org/1999/html">
    <div class="creation_concours container">
        <h1 style="font-size: 31px; font-weight: 700;">Créez un concours</h1>

        <?php echo validation_errors(); ?>

        <?php echo form_open('admin/create'); ?>

        <div class="row">

            <div class="col-xs-12 col-sm-12">


                <div class="form-group">
                    <?php echo form_label('Nom du Concours :', 'name_competition'); ?> <?php echo form_error('dname'); ?><br />
                    <?php echo form_input(array('id' => 'nom', 'name' => 'name_competition', 'class' => 'form-control', 'placeholder' => 'Nom')); ?>
                </div>

                 <div class="form-group">
                    <label for="date_START">Date de début : </label>
                    <input type="date" class="form-control" id="date_START"
                           placeholder="JJ/MM/YYYY hh:mm" name="date_START" />
                </div>

                <div class="form-group">
                    <label for="date_END">Date de fin : </label>
                    <input type="date" class="form-control" id="date_END"
                           placeholder="JJ/MM/YYYY hh:mm" name="date_END" />
                </div>

            </div>

        </div>

        <div class="row">

            <h1 style="font-size: 31px; font-weight: 700; text-align: center">Création des
                pages</h1>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <label for="create_accueil">Page d'accueil : </br></label>
                    <textarea name="create_accueil" id="create_accueil" cols="30" rows="10">Page d'accueil, blablabla</textarea>
                </div>
                <div class="form-group">
                    <label for="create_prix">Page Prix : </br></label>
                    <textarea name="create_prix" id="create_prix" cols="30" rows="10">Page Prix, blablabla</textarea>
                </div>
                <div class="form-group">
                    <label for="create_rules">Page Régles : </br></label>
                    <textarea name="create_rules" id="create_rules" cols="30" rows="10">Page Régles, blablabla</textarea>
                </div>
                <div class="choix_template">
                    <button type="button" class="button btn">Choisir Template</button>
                </div>
                <div class="validation_concours">
                    <input type="submit" name="validation_concours" class="button btn" value="Valider" />
                </div>
            </div>


        </div>
        </form>
    </div>

</section>