<?php
include_once('../geshi.php');
function toon_lijst($lijst) {
	print "<pre>";
	print_r($lijst);
	print "</pre>";
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

// check op inlogd of niet
session_start();
/* 
if (!($_SESSION['bekijken']=="ok")) {
	header('Location: pincode.php');
	exit();
}
//toon_lijst($_SESSION);
*/


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stijl.css">

    <title>PHP Syllabus</title>
</head>

<body>
    <table align="center">
    	<tr><td align="center"><img src='PHPlogo.png' alt="PHP logo" ></td></tr> 
    	<tr><td>
    <ul class="pagination">
    	
    	<?php
    	# opvragen naam huidige pagina.
			$huidig = $_SERVER['SCRIPT_NAME'];
			$huidige_file = substr(strrchr($huidig,'/'),1);
			$deze=99; # administratief.
    	# inlezen lijst pagina's
    	#    nummering moet systematisch zijn
    	$file="scripts_voorbeelden.txt";
			$fopen = @fopen($file,"r");
			$lns=0;
			while (! feof($fopen)) {
				$line = fgets($fopen);
				$line_inhoud = explode(",",$line);
				++$lns;
				$lines[$lns]['bestandsnaam'] = $line_inhoud[0];
				$lines[$lns]['paragraaf'] = $line_inhoud[2];
				//print "$lns $huidige_file > ".$lines[$lns]['bestandsnaam']."<br>"; #debug
				if ($lines[$lns]['bestandsnaam']==$huidige_file) $deze = $lns;
				if ($lines[$lns]['bestandsnaam']=="spacer") $lns--;
				
			}
			if ($deze==99) $deze=0;
			fclose($fopen);
			$eind=$lns;
			
			//toon_lijst($_SERVER);
    	
    	# van de huidige pagina middelste maken
    	# als het de eerste pagina van het rijtje is: positie 1
    	# als het de tweede pagina van het rijtje is: positie 2
    	# alle andere gevallen: positie 3
    	
    	# default gevallen.
    	$prev = $deze-1;
    	$next = $deze+1;
    	$tot = $deze+2;
    	$van = $deze-2;
    	
    	#Uitzonderingsgevallen bepalen
    	switch($deze) {
    		case 0:
    			$van=1;
    			$prev=0;
    			$tot=5;
    			break;
    		case 1:
    			$van=1;
    			$tot=5;
    			break;
    		case $eind:
    			$van = $eind-4;
    			break;
    		case $eind-1:
    			$van = $eind-3;
    		default:
    			$van=$deze-2;
    	}
    	
    	#bepalen TOT
    	$verschil = $eind - $deze;
    	switch($verschil) {
    		case 0:
	    		$van = $eind-4;
	    		$tot = $eind;
	    		$next=$tot;
	    		break;
	    	case 1:
	    		$tot = $eind;
	    		$van = $eind-4;
	    		break;
	    	default:
	    		$van = $deze -2;
	    		if ($van < 1) $van = 1;
	    }
    	
    	
    	#debug...
    	//print "deze = $deze van= $van, tot = $tot, eind = $eind;<br>";    	
    	#...debug
    	print "<li><a href=\"index.php\">&lt;&lt;</a>";
    	print "<li><a href=\"$prev.php\">&lt;</a>";
    	for ($i=$van;$i<=$tot;$i++) {
    			if ($deze==$i) {
						print "<li><a class=\"active\" href=\"".$lines[$i]['bestandsnaam']."\" alt=\"$lines[$i][$paragraaf]\">$i</a>";
    			} else {
						print "<li><a href=\"".$lines[$i]['bestandsnaam']."\" title=\"".$lines[$i]['paragraaf']."\">$i</a>";
    			}
    		
    	}		
    	print "<li><a href=\"$next.php\">&gt;</a>";
    	print "<li><a href=\"$eind.php\" title=\"indexpagina\">&gt;&gt;</a>";
    	
    	?>
    	
    	
    </ul>
  </td></tr>
    </table>
    <hr>
    <div class="main_text">
    <!-- <div align="center"> //-->

    