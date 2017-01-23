<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>Vos Albums</h1>
<br>

<?php
foreach ($albums as $album) {
	echo '<ul>';
	echo '<li><a href="/participate/album/' . $album['id'] . '">' . $album['name'] . '</a></li>';
	echo '</ul>';
}
?>