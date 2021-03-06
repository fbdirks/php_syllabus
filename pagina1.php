<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>1. Introductie</h2>
<p>Deze pagina's geven een beknopte samenvatting van PHP als programmeertaal. De volgorde sluit aan op de volgorde van de PHP cursus van CodeAcademy (<a href="https://www.codeacademy.com">hier</a>). De samenvatting is bedoeld voor beginnende php programmeurs.</p>
<p>PHP is een programmeertaal die uitgevoerd <b>moet</b> worden op een webserver. Daarom is voor het uitvoeren van PHP programma altijd een webserver noodzakelijk. Invoer en uitvoer van PHP programma's vindt meestal plaats via de webbrowser. Die browser is dus wel het venster op de PHP applicatie, maar de <i>webserver</i> voert de PHP code uit.</p>
<p><img src="webserver.jpg"></p>
<p>Je kunt op verschillende manieren een webserver 'charteren' voor je PHP programma's:
	<ul>
		<li>Installeer een webserver op je pc:  <a href="https://www.apachefriends.org/index.html">Xampp</a> of <a href="http://www.usbwebserver.net/nl/">USB Webserver</a> bijvoorbeeld.</li>
		<li>Regel toegang tot een webspace provider met php: <a href="https://www.hosting2go.nl">Hosting2Go</a> bijvoorbeeld</li>
		<li>Maak gebruik van een Online Development IDE: <a href="https://www.codeanywhere.com">CodeAnywhere</a> bijvoorbeeld</li>
	</ul>
</p>	

<h2>Het skelet van een php programma</h2>
<p>Het skelet van een php programma ziet er zo uit:</p>

<pre data-src="hph\v1_skelet.hph"><code class="language-php"></code></pre>
<p>De webserver zal na <b>&lt;?php</b> php aan het werk zetten met de programmaregels die duren tot de eerstvolgende <b>?&gt;</b>. Buiten dat blok mag html code staan. Je kunt in een php pagina php en html zo vaak als je maar wilt mixen.</p>

<pre data-src="hph\v1b_skelet.hph"><code class="language-php"></code></pre>
<div class="vragen">
	<p class="vraag" id="v1">
	1. Waarom kun je niet vanuit de windows verkenner een php file aanklikken om hem uit te voeren?	
	</p>
	<p class="antwoord" id="a1">
	1. Omdat php files door een webserver en niet door windows uitgevoerd moeten worden. 	
	</p>
	
</div>



<?php
include "voet.php";

?>