<section id="section-upload">
  <div class="container">
    <h1 style="font-size: 31px; font-weight: 700;text-align: center;"><?php echo $title; ?></h1>
    <div class="row">
      <div class="col-xs-12 col-sm-12">

        <form method="post" action="">

          <div class="row">
            <div class="col-sm-12 col-xs-12 text-center">

              <p><img src="<?php echo $photo; ?>" class="photo_gallery"></p>
              <?php
              if(isset($uploaded_file_name) && isset($uploaded_file_description))
              {
                ?>
                <input type="hidden" value="<?php echo $uploaded_file_name; ?>" name="fileName">   

                <input type="hidden" value="<?php echo $uploaded_file_description; ?>" name="fileDescription">

                <?php
              }
              ?>
              <input type="submit" class="button" value="Oui" name="<?php echo $input_name; ?>">
              <input type="submit" class="button" value="Non" name="<?php echo $input_name; ?>">
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

</section>