<?php 
include "db_inc.php";
if (!isset($_POST['start'])) {
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt
?>
<form action="opdracht3_1.php" method="post">
	<table>
		<tr>
			<td>Welke regio wilt u bekijken?</td><td><input type="text" name="regio"></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" name="start" value="start"></td>
		</tr>
	</table>
</form>
<?php
} else {
	$region = $_POST['regio']; # opvragen van het ingevulde land
	// en nu de 6 stappen (zonder al te veel commentaar):
	$mysql = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	$start1 = microtime(true);
	$query = "SELECT * FROM bbc WHERE region = '$region'";
	$resultaat = mysqli_query($mysql,$query);
	$eind1 = microtime(true);
	$duur = $eind1 - $start1;
	$rijen1 = mysqli_affected_rows($mysql);
	$kolommen1 = mysqli_field_count($mysql);
	$info1 = mysqli_info($mysql);
	$status1 = mysqli_stat($mysql);
	$rijen1b = mysqli_num_rows($resultaat);
	
	$query2 = "SELECT count(*) FROM bbc WHERE region = '$region'";
	$resultaat2 = mysqli_query($mysql,$query2);
	$res = mysqli_fetch_row($resultaat2);
	$aantal = $res[0];
	
	$query3 = "SELECT sum(area) FROM bbc WHERE region = '$region'";
	$resultaat3 = mysqli_query($mysql,$query3);
	$res = mysqli_fetch_row($resultaat3);
	$som_area = $res[0];
			
	$query4 = "SELECT sum(population) FROM bbc WHERE region = '$region'";
	$resultaat4 = mysqli_query($mysql,$query4);
	$res = mysqli_fetch_row($resultaat4);
	$som_population = $res[0];
		
	$query5 = "SELECT sum(gdp) FROM bbc WHERE region = '$region'";
	$resultaat5 = mysqli_query($mysql,$query5);
	$res = mysqli_fetch_row($resultaat5);
	$som_gdp = $res[0];
		
	
	
	$query6 = "SELECT avg(area) FROM bbc WHERE region = '$region'";
	$resultaat6 = mysqli_query($mysql,$query6);
	$res = mysqli_fetch_row($resultaat6);
	$avg_area = $res[0];
	
	$query7 = "SELECT avg(population) FROM bbc WHERE region = '$region'";
	$resultaat7 = mysqli_query($mysql,$query7);
	$res = mysqli_fetch_row($resultaat7);
	$avg_population = $res[0];
	
	$query8 = "SELECT avg(gdp) FROM bbc WHERE region = '$region'";
	$resultaat8 = mysqli_query($mysql,$query8);
	$res = mysqli_fetch_row($resultaat8);
	$avg_gdp = $res[0];
	
	//print "Execution time: $duur microseconds.  $rijen1 $rijen1b $kolommen1<br />";
	//print "$info1<br />";
	//print "$status1<br />";
	print "<table border=1>";
	print "<tr><td>Regio</td><td>Land</td><td>Area</td><td>Bevolking</td><td>GDP</td></tr>";
	while ($rij = mysqli_fetch_assoc($resultaat)) {
		print "<tr>";
		print "<td>$rij[region]</td>";
		print "<td>$rij[name]</td>";
		print "<td>$rij[area]</td>";
		print "<td>$rij[population]</td>";
		print "<td>$rij[gdp]</td>";
		print "</tr>";
	}
	print "<tr><td><i>Aantal:</i></td><td>$aantal</td><td>$som_area</td><td>$som_population</td><td>$som_gdp</td></tr>";
	print "<tr><td><i>Gemiddeld:</i></td><td></td><td>$avg_area</td><td>$avg_population</td><td>$avg_gdp</td></tr>";
	
}
print "</table>";
?>
<p><a href="opdracht3_1.php">Opnieuw</a></p>