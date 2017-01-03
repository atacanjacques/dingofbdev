<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>Acceuil Appli</h1>
<br>

<?php
if(!$this->facebook->is_authenticated()){
	echo '<a href="/login">Login</a>';
}
else{
	echo '<a href="/participate">Participer</a><br>';
	echo '<a href="/logout">Logout</a>';
}
?>