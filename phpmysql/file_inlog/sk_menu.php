<?php
include "sk_functies.php";

kop();

?>
	<div class="main">
		<h2>Welkom bij dit voorbeeld!</h2>
		<p>U bent ingelogd als <?php print "$voornaam $tv $achternaam ($email), usernaam: $user";?></p>
		<p>Kies de actie:</p>
		<ul>
			<li><a href="sk_uitlog.php">uitloggen</a></li>
			<?php if ($rol==1) {
				print "<li><a href=\"sk_useradd.php\">User toevoegen</a></li>";
			} ?>
		</ul>
	</div>
 
 
<?php

voet();

?>