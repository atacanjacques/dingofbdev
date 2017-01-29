<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <body>
    <div class="col-sm-12">
    <h1>Vos Albums</h1>
    <br>

<?php
foreach ($albums as $album) {
    echo '<ul>';
    echo '<li><a href="participate/album/' . $album['id'] . '" class="button">' . $album['name'] . '</a></li>';
    echo '</ul>';
}
?>
</div>
