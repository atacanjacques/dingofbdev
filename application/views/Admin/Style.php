<!-- UPLOAD SECTION -->
<section id="section-upload">
    <div class="container">
        <h1 style="font-size: 31px; font-weight: 700;">Partager une photo</h1>
        <div class="row">

            <div class="col-xs-12 col-sm-12">

                <form method="post" action="" enctype="multipart/form-data">

                        <p>Changer Couleur Bouton:
                            <input name="color1" class="jscolor" value="577DC2">
                        <p>

                    <p>Changer Couleur Police:
                        <input name="color2" class="jscolor" value="577DC2">
                    <p>

                    <div class="choix_police">
                        <label for="template">Choisir Police </label>
                        <select name="template">
                            <option value="Arial">Arial</option>
                            <option value="theme2">Thème 2</option>
                            <option value="theme3">Thème 3</option>
                        </select>
                    </div>

                    <label for="change_bg">Changer Image Background</label>
                    <input type="file" class="button" />

                    <div class="col-md-12" >
                        <input type="submit" value="Envoyer" class="button">
                    </div>

                </form>

            </div>


        </div>
    </div>

</section>