<?php
include "sk_functies.php";

kop();

?>
	<div class="main">
		<h2>De uitlogpagina.</h2>
		<p>U was ingelogd als <?php print "$voornaam $tv $achternaam ($email), usernaam: $user";?></p>
		<?php 
			session_unset();
			session_destroy();
		?>
		<p>U bent nu uitgelogd.<br><a href="sk_inlog.php">Probeer het nog eens.</a></p>
	</div>
<?php

voet();

?>

	