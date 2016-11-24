<?php 	include "kop.php"; ?>
<form action=index.php method="post">
   <h1>PollOOP: een voorbeeld van OOP in PHP</h1>
<p>Hier tref je een uitleg in voorbeelden aan over OOP in PHP. Het geheel is een <i>werk in uitvoering</i>. Er zal (gaandeweg) meer documentatie aan het project worden toegevoegd.
<p>Klik op een script (of webpagina) om deze te laten uitvoeren. Klik op <input type="button" value="Source"> om de broncode te bekijken.Onderstreepte commando's in de broncode zijn aanklikbaar. Na een klik wordt gesprongen naar de documentatie van dit commando op php.net. Je kunt via het zip bestand alle bestanden downloaden. NB: je moet PHP 5 draaien wil het allemaal werken.</p>
<table>
 <tr><td><a href="oop.pdf">oop.pdf (Uitleg over OOP)&nbsp;&nbsp;<span class="opletten">PDF download</span></a></td><td></td></tr>  
 <tr><td>poll.sql (tabeldefinitie + voorbeelddata) <span class="opletten">source-only</span></td><td><input type="submit" value="Source" name="sql"></td></tr>    
 <tr><td>Poll Klasse (superklasse) <span class="opletten">source-only</span></td><td><input type="submit" value="Source" name="poll1"></td></tr>       
 <tr><td>Poll-database subklasse <span class="opletten">source-only</span></td><td><input type="submit" value="Source" name="poll2"></td></tr>       
 <tr><td>db_inc.php file (voorbeeld)<span class="opletten">source-only</span></td><td><input type="submit" value="Source" name="dbi"></td></tr>       
 <tr><td>Poll-file subklasse <span class="opletten">source-only</span></td><td><input type="submit" value="Source" name="poll3"></td></tr>       
 <tr><td>Poll-session subklasse <span class="opletten">source-only</span></td><td><input type="submit" value="Source" name="poll4"></td></tr>       
 
 <tr><td><a href="poll_db_voorbeeld.php">Voorbeeld Poll-db (poll opgeslagen in mysql database)</a></td><td><input type="submit" value="Source" name="poll5"></td></tr>
 <tr><td><a href="poll_file_voorbeeld.php">Voorbeeld Poll-file (poll opgeslagen in tekst file op server)</a></td><td><input type="submit" value="Source" name="poll6"></td></tr>
 <tr><td><a href="poll_session_voorbeeld.php">Voorbeeld Poll-session (poll opgeslagen in $_SESSION (beperkt nuttig))</a></td><td><input type="submit" value="Source" name="poll7"></td></tr>
</table>
<input type='hidden' name='start' value='ok'>
</form>
<?php
print "</div>";
print "<hr>";
print "<table border=\"1\" width=\"100%\" cellpadding=\"25\"><tr><td bgcolor=\"#FFDC87\" >";

include_once('../../geshi/geshi.php');

$geshi = new GeSHi($source, $language);

if (isset($_POST['start'])) {
   
   // hier wordt opgevraagd welke key in index 0 staat van Post, dat is het nummer van de knop
    $lijst = array_keys($_POST);
    $sleutel = $lijst[0];
    switch ($sleutel) {
        case "sql":
        		$bestand = "poll.sql";
        		break;
        case "poll1":
            $bestand = "Poll.php";
            break;
        case "dbi":
        	$bestand = "db_inc_.php";
        	break;
        case "poll2":
            $bestand = "Poll_db.php";
            break;
        case "poll3":
            $bestand = "Poll_file.php";
            break;
        case "poll4":
            $bestand = "Poll_session.php";
            break;
        case "poll5":
            $bestand = "poll_db_voorbeeld.php";
            break;
        case "poll6":
            $bestand = "poll_file_voorbeeld.php";
            break;
        case "poll7":
            $bestand = "poll_session_voorbeeld.php";
            break;
        
       
    }
    unset($_POST);
    $geshi->enable_line_numbers(GESHI_NO_LINE_NUMBERS);
    $geshi->load_from_file("$bestand");
    print "<h2>Sourcecode $bestand</h2>";
    print $geshi->parse_code();

}
print "</td></tr></table>";
print "<div align=\"center\">";
include "voet.php";

?>
