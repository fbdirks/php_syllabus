<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>31: Uitwerking inlogsysteem op filebasis</h2>
<p>Op deze pagina staat een uitwerking van het inlogsysteem met behulp van een file met usergegevens. Met nadruk zij gezegd dat dit maar 'een' uitwerking is. Een compleet systeme met userbeheer en <i>afdoende</i> security zal nog de nodige toevoegingen vergen.</p>
<p>De inlogpagina is een simpel html formulier (verfraaid met css) en uitgebreid met de php inlogcontrole:</p>
<!-- Geef de php file geen php extensie als dit in een php pagina geintegreerd wordt -->
<pre data-src="file_inlog/file_inlog.hph"><code class="language-php"></code></pre>

<p>Alle pagina's maken gebruik van deze functies:</p>
<pre data-src="file_inlog/file_functies.hph"><code class="language-php"></code></pre>

<p>De hoofdpagina <i>na</i> het inloggen bevat twee keuzes, maar de tweede keuze is alleen zichtbaar voor admins (met een rol = 1):</p>
<pre data-src="file_inlog/file_pagina1.hph"><code class="language-php"></code></pre>

<p>De pagina om users toe te voegen doet twee dingen met de userlijst: (1) altijd onderaan volledig tonen en (2) als er nieuwe usergegevens zijn ingevoerd deze aan de userlijst toevoegen:</p>
<pre data-src="file_inlog/file_useradd.hph"><code class="language-php"></code></pre>

<p>De uitlogpagina is recht toe recht aan:</p>
<pre data-src="file_inlog/file_uitlog.hph"><code class="language-php"></code></pre>

<p>Tot slot nog de css:</p>
<pre data-src="file_inlog/file_stijl.css"><code class="language-css"></code></pre>

<?php
include "voet.php";

?>