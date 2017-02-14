    <div class="container text-center">
    <div class="row">
    <h1>Vos Albums</h1>

<?php
foreach ($albums as $album) {
    echo '<ul>';
    echo '<li><a href="participate/album/' . $album['id'] . '" class="button">' . $album['name'] . '</a></li>';
    echo '</ul>';
}
?>
</div>
    </div>