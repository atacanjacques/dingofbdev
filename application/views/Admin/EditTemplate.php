<!-- BLOC 1 -->
<section id="section-edit">
    <div class="container">
        <h1 style="font-size: 31px; font-weight: 700;">Modifiez Styles</h1>
        <div class="row">

            <div class="col-xs-12 col-sm-12">

                <label for="name_competition">CHANGER COULEUR BOUTON : </label>
                <div id="cp2" class="input-group colorpicker-component">
                    <input type="text" value="#00AABB" class="form-control" />
                    <span class="input-group-addon"><i></i></span>
                </div>
                <script>
                    $(function() {
                        $('#cp2').colorpicker();
                    });
                </script>


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