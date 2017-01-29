<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <h1>Vos photos</h1>
    <br>

<?php
foreach ($photos as $photo) {
    echo '<a href="/participate/index/' . $photo['id'] . '"><span style="width:100px;height:100px;display:inline-block;background-size:cover;background-image:url(' . $photo['images'][0]['source'] . ');"></span></a>';
}
?>