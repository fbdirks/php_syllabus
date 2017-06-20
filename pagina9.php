<?php
include "kop.php";
?>

<h2>9. Arrays</h2>
<p>Arrays zijn <i>verzamelingen</i>, je zou ook kunnen zeggen <i>lijsten</i> van variabelen. Het bijzondere van arrays is dat een array maar &eacute;&eacute;n naam heeft, maar de individuele variabelen wel apart te gebruiken zijn. Dat komt doordat arrayelementen 'rugnummers' hebben. Iets formeler gezegd: ieder array element heeft een 'index' waarmee je dat element kunt benaderen.</p>
<p>Neem als voorbeeld een boek: een boek is <i>een verzameling</i> bladzijden die allemaal een eigen paginanummer hebben. </p>
<p><pre>
	$boek  (de array)
	$boek[10] - pagina 10 van het boek
	$boek[0] - de titelpagina van het boek (arrays starten hun 'rugnummers' altijd met 0)
	</pre></p>
<p>Ander voorbeeld: een CD of DVD is een verzameling van <i>tracks</i> die een <i>nummer</i> hebben, maar vaak ook een <i>naam</i> waarmee je ze kunt opzoeken.</p>
<p>$_POST is een jullie wel bekend voorbeeld van een array. Ieder element heeft daar een index die de 'name' is van het bijhorende invoer element.</p>
<p><pre>
	$inlognaam = $_POST['inlognaam'];
	$password = $_POST['password'];
	$knop = $_POST['submit'];
</pre></p>
<p>Voorbeeldje: Ons team van camping voetbalsters:
	<ol>
		<li>Aanvoerder en keepster: Kim</li>
		<li>Verdedigster Links Achter: Janna</li>
		<li>Verdedigster Midden: Henny</li>
		<li>Verdedigster Rechts Achter: Heleen</li>
		<li>Centrale middenvelder: Jopie</li>
		<li>Linker middenvelder: Hellen</li>
		<li>Linker aanvalster: Carice</li>
		<li>Centrumspits: Alja</li>
		<li>Rechter aanvalster: Pauline</li>
	</ol>
Merk op dat je iedere speelster met een rugnummer zou kunnen vinden, maar ook met de 'taak'. <b>Let op:</b> In alle programmeertalen is het gebruikelijk dat array-elementen volgnummers krijgen <b>vanaf 0</b>. In het voorbeeld van het voetbalteam zou dus $team[0] gereserveerd kunnen worden voor de aanvoerster en zou de keepster dan $team[1] toegewezen kunnen krijgen.
</p>
<p>Een array waarbij andere indexen gebruikt worden als volgnummers wordt in PHP altijd een 'associatieve' array genoemd: er is een associatie tussen een vrij gekozen index (bijvoorbeeld 'Aanvoerster') en de waarde van het array element ('Kim').</p>
<p>Ik raad je niet aan bij eigengemaakte arrays beide systemen (volgnummers en associatieve indexen) door elkaar te gebruiken. Kies voor de een of de ander. Bij ingebouwde arraysystemen ($_POST of de resultaten van mysql queries) kun je soms beide systemen door elkaar gebruiken, maar bijna altijd is de associatieve manier de duidelijkste.</p>
<p>Drie technische aspecten van arrays:
	
	<ul>
		<li>Aanmaken van een array en toekennen van een waarde</li>
		<li>Oproepen van een array element</li>
		<li>Veranderen of verwijderen van een array element</li>
		<li>Het automatisch doorlopen van een array</li>
	</ul>
	In de code hieronder zie je deze dingen bij wijze van voorbeeld.
	</p>
<p>In serieuze programma's kun je niet om arrays heen. Op <a href="https://php.net">php.net</a> vind je een uitgebreid hoofdstuk met alle array commando's en mogelijkheden.</p>


<p>Voorbeeld 1: simpele toewijzing en opvraging van array elementen:</p>
<pre data-src="v9a_arrays.hph","php"><code class="language-php"></code></pre>
En de output:
<div class="voorbeeldOutput"><?php include 'v9a_arrays.php';?></div>

<p>Voorbeeld 2: als we willen weten wat er precies in een array zit (bijvoorbeeld $_POST!!) is het volgende commando super handig:</p>
<pre data-src="v9b_arrays.hph","php"><code class="language-php"></code></pre>
En de output:
<div class="voorbeeldOutput"><?php include 'v9b_arrays.php';?></div>

<p>Voorbeeld 3: dit is de toewijzing van een <i>associatieve</i> array, en een toepassing van <i>foreach</i> om heel makkelijk door een array heen te ploegen. </p>
<pre data-src="v9c_arrays.hph","php"><code class="language-php"></code></pre>
En de output:
<div class="voorbeeldOutput"><?php include 'v9c_arrays.php';?></div>
<p>Voorbeeld 4: er zijn veel array functies in PHP. Dit zijn een paar voorbeelden van sorteerfuncties (en een andere invulling van ForEach). Bovendien veranderen we hieronder een array, we halen er een element uit:</p>
<pre data-src="v9d_arrays.hph","php"><code class="language-php"></code></pre>
En de output:
<div class="voorbeeldOutput"><?php include 'v9d_arrays.php';?></div>
<p>Opmerking: als je in een print regel een array-element van een associatieve array wilt opnemen moet je uitkijken met de aanhalingstekens. Het beste kun je de aanhalingstekens rondom een array index <i>in</i> een print/echo regel gewoon weglaten!</p>
<pre data-src="v9e_arrays.hph","php"><code class="language-php"></code></pre>
En de output:
<div class="voorbeeldOutput"><?php include 'v9e_arrays.php';?></div>
<p>Slotopmerking: we komen later nog een keer op arrays terug, met name op multidimensionale arrays.</p>
<?php
include "voet.php";

?>