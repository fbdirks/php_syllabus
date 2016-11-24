<?php

include "kop.php";

?>


<h2>Dit zijn de voorbeeldantwoorden van de lessenserie php/mysql:</h2>
<ul>
<li><a href="opdracht1_3.php">Opdracht 1-3</a> <a href="#1_3">code</a></li>
<li><a href="opdracht1_4.php">Opdracht 1-4</a> <a href="#1_4">code</a></li>
<li><a href="opdracht2_2.php">Opdracht 2-2</a> <a href="#2_2">code</a></li>
<li><a href="opdracht3_1b.php">Opdracht 3-1</a> <a href="#3_1">code</a></li>
<li><a href="opdracht3_2.php">Opdracht 3-2</a> <a href="#3_2">code</a></li>
<li><a href="opdracht3_3.php">Opdracht 3-3</a> <a href="#3_3">code</a></li>
</ul>
<p>Opmerking: het is niet nodig dat je code 100% gelijk is aan wat hier allemaal staat. In de onderstaande uitwerkingen is aan opmaak en vormgeving weinig aandacht besteed. Zorg er wel voor dat de mysql onderdelen (queries, en resultaten) goed overeenkomen. Daar gaat het vooral om!</p>

<h3>En hier zijn de programma's:</h3>
<br /><br />
<a name="1_3"><h3>Opdracht1_3.php</h3></a>
<?php
	$code = '';
	$geshi = new GeSHi($code, 'php');
	$geshi->load_from_file("opdracht1_3.php");
	
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
?>

<br /><br />
<a name="1_4"><h3>Opdracht1_4.php</h3></a>
<?php
	$code = '';
	$geshi = new GeSHi($code, 'php');
	$geshi->load_from_file("opdracht1_4.php");
	
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
?>

<br /><br />
<a name="2_2"><h3>Opdracht2_2.php</h3></a>
<?php
	$code = '';
	$geshi = new GeSHi($code, 'php');
	$geshi->load_from_file("opdracht2_2.php");
	
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
?>

<br /><br />
<a name="3_1"><h3>Opdracht3_1.php</h3></a>
<?php
	$code = '';
	$geshi = new GeSHi($code, 'php');
	$geshi->load_from_file("opdracht3_1b.php");
	
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
?>

<br /><br />
<a name="3_2"><h3>Opdracht3_2.php</h3></a>
<?php
	$code = '';
	$geshi = new GeSHi($code, 'php');
	$geshi->load_from_file("opdracht3_2.php");
	
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
?>
<br /><br />
<a name="3_3"><h3>Opdracht3_3.php</h3></a>
<?php
	$code = '';
	$geshi = new GeSHi($code, 'php');
	$geshi->load_from_file("opdracht3_3.php");
	
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
?>

</body>
</html>