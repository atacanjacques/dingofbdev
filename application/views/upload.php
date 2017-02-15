<!-- UPLOAD SECTION -->
<section id="section-upload">
    <div class="container">
        <?php
        if(!empty($errors))
        {
            echo '<div class="alert alert-warning" role="alert">';
            echo 'Erreur :<br>';
            foreach ($errors as $error)
            {
                echo $error;
            }
            echo '</div>';

        }
        ?>
        <h1 style="font-size: 31px; font-weight: 700;">Partager une photo</h1>
        <div class="row">

            <div class="col-xs-12 col-sm-12">

                <form method="post" action="/participate/add_photos" enctype="multipart/form-data">

                    <label for="upload_photo">Sélectionner une photo facebook </label>
                    <div>
                        <a href="/participate/album" class="button display-block">Choisir</a>
                    </div>

                    <label for="import_fb">Importer une photo sur facebook </label>
                    <input type="file" name="photo_file">

                    <label for="description_photo">Description : </label>
                    <div class="col-md-12">
                    <textarea class="form-control" id="textarea" name="photo_description" rows="11">Ma participation au concours <?php echo date('d-m-Y H:i:s'); ?></textarea>
                    </div>

                    <div class="col-md-12" >
                        <input type="submit" value="Ajouter à mes photos" class="button" name="submit">
                    </div>

                </form>

            </div>


        </div>
    </div>

</section>