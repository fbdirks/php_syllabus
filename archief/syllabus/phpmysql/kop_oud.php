<?php
include_once('../../geshi.php');
function toon_code($code) {
	$geshi = new GeSHi($code, 'php');
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
}

function toon_html($code) {
	$geshi = new GeSHi($code, 'html5');
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
}

function navigatie($pagina) {
	$max=6;
	for ($p=0;$p<=$max;$p++) {
		if ($p==0) {
			print "<a href=\"les0.php\">inhoudsopgave</a>";
		} elseif($p==$pagina) {
			print "[ $p ]";
		} else {
			print "<a href=\"les$p.php\">[ $p ]</a>";
		}
	}
	
}



?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stijl.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
		

    <title>SQL Oefenen</title>
</head>

<body>
		<!-- voor later -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <table align="center"><tr><td><h2><img src='php2.gif' alt="php" valign="middle"> PHP & MySQL in webapplicaties<img src='mysql.jpg' alt="mysql" valign="middle"></h2></td></tr> </table>
    <hr>
    <div >

