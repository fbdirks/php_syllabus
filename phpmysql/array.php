<?php
include "kop.php";
include_once('../../geshi.php');
function toon_code($code) {
	$geshi = new GeSHi($code, 'php');
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
}


?>
<h6><a href="les0.php">Inhoudsopgave</a> [1] <a href="les2.php"> [2] </a><a href="les3.php"> [3] </a></h6>
<h1>Achtergrond: mysql resultaten geschikt maken voor php verwerking</h1>
<p>Als je stap 4 uitvoert:</p>
<?php
$code = '$resultaat = mysqli_query($mysql,$query);';
toon_code($code);
?>
<p>
	komt in de variabele <em>$resultaat</em> het resultaat van de query te staan. Maar, dat is het resultaat in de 'taal' van MySQL. Stel je dit maar voor als een tabel:
</p>
<table border="1" align="center">
	<tr>
		<td>.</td><td>.</td><td>.</td><td>.</td>
	</tr>
	<tr>
		<td>.</td><td>.</td><td>.</td><td>.</td>
	</tr>
	<tr>
		<td>.</td><td>.</td><td>.</td><td>.</td>
	</tr>
	<tr>
		<td>.</td><td>.</td><td>.</td><td>.</td>
	</tr>
</table>
<p>
	Maar het is wel een tabel die nog geschikt is voor verdere verwerking. Het commando <em>mysqli_fetch_row</em> is in staat om die MySQL tabel rij voor rij op te halen en die rij in een php lijst te stoppen. Dus, als dat commando een keer draait krijgt php dit te zien:  
</p>
<table border="1" align="center">
	<tr>
		<td>[0]:***</td><td>[1]:***</td><td>[2]:***</td><td>[3]:***</td>
	</tr>
</table>
<p>
	Dit is een PHP lijst met 4 vakjes die de 'rugnummers' 0 tot en met 3 hebben. PHP kan de waarden van die vakjes (die hier voorgesteld wordt door *** ) ophalen door de naam van de rij ($rij) te gebruiken met het 'rugnummer' van het vakje dat PHP nodig heeft: $rij[3] bijvoorbeeld haalt de waarde op van vakje 3 en $rij[2] de waarde van vakje 2. Vakjes beginnen altijd te nummeren met 0! Dus vakje 2 is eigenlijk het derde vakje! Door WHILE om het commando heen te zetten gaat PHP het commando mysqli_fetch_row net zo lang herhalen zolang er rijen zijn in $resultaat.
 </p>
<?php
$code = 'while($rij = mysqli_fetch_row($resultaat)) { ... acties ...}';
toon_code($code);
?>
<p>
	Het commando <em>foreach</em> is een heel makkelijk commando. Je kunt het alleen op een PHP lijst toepassen. Het commando <em>foreach ($rij as $veld)</em> kun je 'talig' zo lezen:  "Bekijk in de lijst $rij ieder vakje en noem de inhoud van dat vakje eventjes $veld". Binnen de {  } van de foreach moet je dan wel iets doen met die inhoud, bijvoorbeeld printen: echo $veld.</p>
<p>
	Eigenlijk doen mysqli_fetch_row en foreach een beetje hetzelfde: mysqli_fetch_row haalt RIJ voor RIJ een resultaatrij op uit een MysqlResultaat en foreach haalt VELD voor VELD een resultaatveld op uit een resultaatrij. 
</p>

</div>
<?php
include "voet.php";
?>	