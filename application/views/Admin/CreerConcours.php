<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- CONTENT -->
<!-- BLOC 1 -->
<section id="section-accueil">
    <div class="creation_concours container">
        <h1 style="font-size: 31px; font-weight: 700;">Créez un concours</h1>
        <div class="row">

            <div class="col-xs-12 col-sm-12">

                <div class="form-group">
                    <label for="name_competition">Nom du concours : </label>
                    <input type="text" class="form-control" placeholder="Nom"/>
                </div>


                <div class="form-group">
                    <label for="date_START">Date de début : </label>
                    <input type="text" class="form-control" id="date_START" placeholder="JJ/MM/YYYY hh:mm"/>
                </div>

                <div class="form-group">
                    <label for="date_END">Date de fin : </label>
                    <input type="text" class="form-control" id="date_END"placeholder="JJ/MM/YYYY hh:mm"/>
                </div>

            </div>

        </div>

            <div class="row">

                <h1 style="font-size: 31px; font-weight: 700; text-align: center">Création des pages</h1>

                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="create_accueil">Page d'accueil : </br></label>
                        <textarea name="" id="" cols="30" rows="10">Page d'accueil, blablabla</textarea>
                    </div>
                    <div class="form-group">
                        <label for="create_prix">Page Prix : </br></label>
                        <textarea name="" id="" cols="30" rows="10">Page Prix, blablabla</textarea>
                    </div>
                    <div class="form-group">
                        <label for="create_rules">Page Régles : </br></label>
                        <textarea name="" id="" cols="30" rows="10">Page Régles, blablabla</textarea>
                    </div>
                    <div class="choix_template">
                        <button type="button" class="button btn">Choisir Template</button>
                    </div>
                <div class="validation_concours">
                    <button type="button" class="button btn">Valider</button>
                </div>
                </div>


            </div>
        </div>

</section>