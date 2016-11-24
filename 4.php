<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>4. Rekenoperatoren (basis)</h2>
<p>De basis reken operatoren zijn: + - / *  en % . Alleen het commando % is even wennen: dit levert de <i>rest</i> op in deling. Dus:
	<ul>
		<li>3 + 4 => 7</li>
		<li>5 - 2 => 3</li>
		<li>4 * 5 => 20</li>
		<li>15 / 2 => 7.5</li>
		<li>15 % 2 => 1 (!)</li>
	</ul></p>
<p>Let in het onderstaande voorbeeld ook op de volgorde in noteren: in plaats van a + b = c  wordt in PHP (zoals in vrijwel alle andere programmeertalen) de volgorde gehanteerd c = a + b. Dat komt omdat een rekensom in PHP een <i>toewijzing</i> is.</p>
<p>In een toewijzing staat het <i>onbekende</i> <b>altijd</b> links en het bekende altijd rechts. Op die manier leest de interpeter de commando regels altijd:
	<ul>
		<li>onbekend = bekend</li>
		<li>of nog strakker:  onbekend <i>wordt gelijk aan</i> bekend</li>
		<li>= betekent dus niet '<b>is</b> gelijk aan' maar '<b>wordt</b> gelijk aan'</li>
	</ul></p>
	<p>Behalve de genoemde 5 rekencommando's heeft PHP voorzieningen voor de meest denkbare wiskundige berekeningen zoals machtsverheffen, worteltrekken, sinus/cosinus enzovoorts. Een klein beetje zoeken in de documentatie op php.net <a href="http://php.net/manual/en/book.math.php">[klik]</a> is voor dit soort functies meestal voldoende.</p>
	<p>Hieronder staan al twee kleine voorbeeldjes van dit soort commando's.</p>





<?php
toon_file("v4_rekenen.php");
?>

<?php
include "voet.php";

?>