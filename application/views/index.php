<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>Acceuil Appli</h1>
<br>

<?php

if($is_authenticated){
	?>
	<h2>Bienvenue</h2>
	<a href="https://www.facebook.com/settings?tab=applications">Mes applications</a>
	<br>
	<a href="/logout">Logout</a>
	<?php
}
else{
	?>
	<a href="<?php echo $login_url; ?>">Login</a>
	<?php
}
?>