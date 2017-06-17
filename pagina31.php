<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>31: Uitwerking inlogsysteem op filebasis</h2>
<p>Op deze pagina staat een uitwerking van het inlogsysteem met behulp van een file met usergegevens. Met nadruk zij gezegd dat dit maar 'een' uitwerking is. Een compleet systeme met userbeheer en <i>afdoende</i> security zal nog de nodige toevoegingen vergen.</p>
<p>De inlogpagina is een simpel html formulier (verfraaid met css) en uitgebreid met de php inlogcontrole:</p>
<?php 
toon_file("file_inlog/file_inlog.php","nee");
?>
<p>Alle pagina's maken gebruik van deze functies:</p>
<?php
toon_file("file_inlog/file_functies.php","nee");
?>
<p>De hoofdpagina <i>na</i> het inloggen bevat twee keuzes, maar de tweede keuze is alleen zichtbaar voor admins (met een rol = 1):</p>
<?php 
toon_file("file_inlog/file_pagina1.php","nee");
?>
<p>De pagina om users toe te voegen doet twee dingen met de userlijst: (1) altijd onderaan volledig tonen en (2) als er nieuwe usergegevens zijn ingevoerd deze aan de userlijst toevoegen:</p>
<?php 
toon_file("file_inlog/file_useradd.php","nee");
?>
<p>De uitlogpagina is recht toe recht aan:</p>
<?php 
toon_file("file_inlog/file_uitlog.php","nee");
?>
<p>Tot slot nog de css:</p>
<?php 
toon_file("file_inlog/file_stijl.css","nee");
?>
<?php
include "voet.php";

?>