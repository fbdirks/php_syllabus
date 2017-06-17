<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>29: Schrijven naar een csv bestand</h2>
<p>Het schrijven naar een bestand heeft veel weg van het lezen van een bestand, maar verschilt daar natuurlijk op een paar essentiele punten wel van:</p>
<p>Hieronder wordt het bestand voorbeeld2.csv geopend, maar dan voor schrijven ('toevoegen' eigenlijk). Ferry (rugnummer 22) wordt als reserve toegevoegd.</p>
<br>
<?php

toon_file("29a.php","ja");

?>
<br>
<p>Zie het commentaar bij de code.</p>
<p>Het grote voordeel van csv files is dat ze door Excel en een hele boel andere applicaties zo in te lezen zijn!</p>
<p>De commando's fgets en fputs werken net zo als fgetcsv en fputcsv, maar deze zijn op de <b>hele</b> regel georienteerd. fgets leest in een keer een regel uit het bestand in, maar verdeelt het niet in een array. Dat zou je dan zelf moeten doen met een commando als <i>explode</i>.</p>

<p>Opdracht: schrijf een inlogsysteem waarvoor gebruikers zich kunnen registreren die usernaam en wachtwoord bijhoudt in een users.csv bestand. Zorg ervoor dat dit bestand ook gebruikt wordt voor de controle van een inlog.</p>

<?php
include "voet.php";

?>