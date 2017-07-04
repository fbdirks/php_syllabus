<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>Twee handigheidjes</h2>
<p>Hieronder staan een paar files waarin twee handigheidjes ingebakken zitten. De eerste handigheid is: plaats testcode in de class definitie. Een manier (het kan zoals zovaak bij programmeren op meer manieren) is om in de file met de klassedefinitie ook testcode te zetten. De testcode in de onderstaande klasse definitie is zo ingericht dat deze testcode alleen wordt gestart als de server merkt dat de pagina die is aangeroepen door de user precies deze pagina is. Als de klasse definitie wordt aangeroepen door een <i>andere</i> pagina met een include dan wordt deze code niet uitgevoerd. Dit is de file:</p>
<pre data-src="hph/optelling.hph","php"><code class="language-php"></code></pre>

<p>In de testcode moet je een paar belangrijke testsituaties een plek geven. Iedere keer als je de klasse-definitie (in dit geval <i>optelling.php</i>) aanroept, worden deze testen uitgevoerd en kun je controleren of de klasse nog steeds goed werkt. Zodra je de klasse via een include in een andere file binnenlaadt wordt de testcode niet meer uitgevoerd.</p>
<p>De tweede handigheid is ook iets dat op andere manieren zou kunnen. Beschouw het maar als een idee. In het bestand debug.php staat een handige functie die je kunt gebruiken bij debuggen en er staat één variabele in: $debug, die 'true' of 'false' gezet kan worden. De functie die in dit voorbeeld staan zijn: <i>toon_lijst($lijst)</i> waarmee je altijd de inhoud van een array, bijvoorbeeld $_SESSION of $_POST, kunt bekijken. </p>
<p>Kenmerkend voor de functie is dat de functie pas wat doet als $debug op true staat. Waarom is dat een voordeel? Je kunt in de hoofdfile de functie (en misschien nog wel andere die je helpen om een bestand te debuggen) aanroepen. Hij doet echter pas wat als $debug (in 'debug.php') op true staat. Zonder in de hoofdcode dus wat te hoeven aanpassen kun je (via 'debug.php') debugfuncties aan of uit zetten.</p>
<p>Dit is (een voorbeeld voor) debug.php:</p>
<pre data-src="hph/debug.hph","php"><code class="language-php"></code></pre>

<p>En dit is een voorbeeld van een aanroepende file die de klassefile en debug.php binnenleest en wat debug functies gebruikt, maar alleen als $debug true is!</p>
<pre data-src="hph/optelsom.hph","php"><code class="language-php"></code></pre>

<?php
include "voet.php";

?>
