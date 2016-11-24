<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>21. Het voorbeeld: een eenvoudige meningspeiling (poll) in PHP</h2>
<p>
We willen graag voor een website een programma schrijven waarmee we snel en gemakkelijk een meningspeiling kunnen opzetten. We willen er een echt systeem van maken, met andere woorden: het systeem moet vaker gebruikt kunnen worden met verschillende meningspeilingen.
</p>
<p>Kenmerkend voor OOP is dat je eerst op zoek gaat naar de objecten die je nodig denkt te hebben en met name naar hun structuur. Dit zijn twee voorbeelden van (eenvoudige) polls die we als uitgangspunt gebruiken.</p>
<p align="center">
	<img src="poll1.jpg"><img src="poll2.jpg">
</p>
<p>
De volgende stap in het OOP denken is dan het op een abstracte manier modelleren van de eigenschappen en methoden die in deze voorbeelden te onderkennen zijn.</p>
<p>

Op de volgende pagina zie je op de onderste helft van de pagina een iets formelere definitie van het object Poll. Hierin is al wat meer nagedacht over de eigenschappen en methoden die nodig zijn en zijn – ter illustratie - bijvoorbeeld ook al de 'onzichtbare' eigenschappen en methoden die met start- en einddatum te maken hebben meegenomen.
</p><p>
De praktijk is meestal dat iemand die op deze manier gaat nadenken over een object steeds meer idee heeft welke eigenschappen en methoden er nodig zijn. Al denkende groeit op die manier het ontwerp.
</p>
<p>Dit zou het resultaat van een eerste brainstorm kunnen zijn:</p>
<p align="center"><img src="elementen_poll.jpg"></p>
<p>In de wereld van UML (Unified Modeling Language) wordt dit op de volgende manier genoteerd:</p>
<p align="center"><img src="uml_poll.jpg"></p>
<p>Na de naam van het object volgen eerst de eigenschappen en daarna de methoden. Bij iedere eigenschap of methode wordt het type aangegeven. Er zijn ontwikkeltools waar je dit op deze manier in kunt invoeren en waar de tool dan na een druk op de knop de complete java of php kaders programmeert waar je zelf 'alleen nog maar' de eigen programmacode aan hoeft toe te voegen. </p>


<?php
include "voet.php";

?>