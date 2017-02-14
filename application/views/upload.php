<!-- UPLOAD SECTION -->
<section id="section-upload">
    <div class="container">
        <h1 style="font-size: 31px; font-weight: 700;">Partager une photo</h1>
        <div class="row">

            <div class="col-xs-12 col-sm-12">

                <form method="post" action="" enctype="multipart/form-data">

                    <label for="upload_photo">Sélectionner une photo facebook </label>
                    <div>
                    <a href="/participate/album" class="button display-block">Choisir</a>
                    </div>

                    <label for="import_fb">Importer une photo sur facebook </label>
                    <input type="file" class="button" />

                    <label for="description_photo">Description : </label>
                    <div class="col-md-12">
                        <textarea class="form-control" id="textarea" name="textarea" rows="11">ici la description de la photo</textarea>
                    </div>

                 <div class="col-md-12" >
                    <input type="submit" value="Envoyer" class="button">
                 </div>

                </form>

            </div>


        </div>
    </div>

</section>