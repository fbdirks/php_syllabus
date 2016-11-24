<?php 
// Dit script selecteert het land dat gewijzigd moet worden en maakt het wijzigingsformulier klaar
include "db_inc.php";
if (!isset($_POST['start'])) {
	
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt

?>
	<form action="injectie.php" method="post">
		<table>
			<tr>
				<td>usernaam?</td><td><input type="text" name="user"></td>
			</tr>
			<tr>
				<td>wachtwoord?</td><td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td><td><input type="submit" name="start" value="check"></td>
			</tr>
		</table>
	</form>
<?php

} else {
	// dingen die gedaan moeten worden als WEL op de knop is gedrukt.
	
	$user = $_POST['user']; # opvragen van het in het formulier ingevulde land
	$ww = $_POST['password'];
	
	
	// en nu de 6 stappen (zonder al te veel commentaar):
	$mysql = mysql_connect($db_host, $db_user, $db_password); #1 en 2
	$dbase = mysql_select_db($db_name);
	$query = "SELECT * FROM 1_users WHERE usernaam = '$user' AND password = '$ww'";#3
	print "<br />De query is: $query<br /><br />";
	$resultaat = mysql_query($query);
	if (mysql_num_rows($resultaat)==0) {
		print "U bent niet goed ingelogd! Overnieuw! <br /><br />";
		print "Probeer het met deze gegevens: ' or ''='  op de plek van usernaam en wachtwoord.";
	} else {
	
	// gegevens opvraagbaar maken (= stap 5)
	$rij = mysql_fetch_assoc($resultaat);
	
	$name = $rij['usernaam'];
	$wwh = $rij['password'];
	
	// Voor controle op scherm zetten
	print "U bent succesvol ingelogd!<br /><br />";
	print "Deze gegevens zijn opgevraagd:<br />";
	print "Usernaam: $name, Wachtwoordhash: $wwh<br /><br />";
	print "Gelukkig doet dit programma er helemaal niets mee...";
	} 
		

	
	# mysql_close($mysql); #6
}
?>
<p><a href="injectie.php">Opnieuw</a></p>