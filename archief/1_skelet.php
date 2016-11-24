<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>Het skelet van een php programma</h2>
<p>Het skelet van een php programma ziet er zo uit:</p>

<?php
toon_file("v1_skelet.php");
?>
<p>De webserver zal na <b>&lt;?php</b> php aan het werk zetten met de programmaregels die duren tot de eerstvolgende <b>?&gt;</b>. Buiten dat blok mag html code staan. Je kunt in een php pagina php en html zo vaak als je maar wilt mixen.</p>


<?php toon_file("v1b_skelet.php"); ?>

<?php
include "voet.php";

?>