<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>Een paar opmerkingen over syntax</h2>

<p>Syntax zijn taalregels. Praktisch gezien is de belangrijkste syntax regel de ; aan het eind van een php commandoregel. Als je die vergeet weet PHP niet of het commando afgelopen is. Je krijgt dan soms een foutmelding op de <i>volgende</i> regel in je programma. <b>Tip:</b> Als je een foutmelding krijgt met een regelnummer er in, kijk dan ook even op de regel <i>erboven</i>.</p>
<p>Commentaar is enorm handig. Hierin kun je <i>voor anderen</i> of <i>voor jezelf</i> noteren wat je bedoelde met een bepaalde code. Noteren voor jezelf is belangrijker dan je denkt: als je na een maand een programma weer opzoekt dat je zelf geschreven hebt kun je er soms lastig meer de weg in vinden. Commentaar regels zijn dan een uitkomst.</p>
<p>Een <b>blok</b> commentaar wordt gestart met /*  en zoveel regels later als nodig afgesloten met */ . Met deze commando's kun je ook makkelijk een stuk code tijdelijk deactiveren: zet er een blokcommentaar omheen!</p>
<p>Een commentaar-<b>regel</b> laat je voorafgaan door // . Alles na die tekens wordt door PHP genegeerd. Zo kun je dus eventueel ook een regel 'even' uitzetten.</p>
<p>Soms wil je aan het eind van een regel een kleine commentaar opmerking plaatsen. Dat kan met // maar ook met # gevolgd door een opmerking.</p>
<p>Vuistregel: wees niet te uitbundig, maar ook niet te zuinig met commentaar!</p>
<?php
toon_file("v6_syntax.php");
?>
<p>Hieronder een klein voorbeeld van een foutmelding op een verkeerde regel. Waar zit de fout?</p>
<?php
toon_file("v6b_syntax.php");
?>
<?php
include "voet.php";

?>