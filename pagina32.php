<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>32: Versie Controle met Git</h2>
<p>Dit is een (aangepaste) vertaling van de Git Tutorial van Jae Woo Lee and Stephen A. Edwards Columbia University (maart 2013)</p>

<p>Git is een versie controle systeem voor programmacode. Zo'n systeem is nuttig als je in een team werkt, maar ook als je alleen werkt. Het is een handig hulpmiddel om bij te houden welke veranderingen je hebt aangebracht aan je programmacode.</p>
<p>Git kun je hier downloaden: <a href="https://git-scm.com/">https://git-scm.com/</a></p>
<p>De basisversie van Git is een programma dat alleen via de commandline werkt. Je kunt zowel in de cmd van windows werken als in een speciale (bij Git 'meegeleverde') bash-omgeving, dat is een onder Linux veel gebruikte commandline. Behalve deze commandline versie zijn er voor Git ook windowed clients. In diverse editors (Sublime, Brackets e.d.) zitten soms Git clients ingebouwd of zijn er als extensie (add on) aan toe te voegen.</p>
<p>Heel belangrijke sites in de Git-wereld (behalve git-scm.com) zijn <a href="http://github.com">Github</a> en <a href="http://www.bitbucket.com">Bitbucket</a>. Hier kun je als persoon of als team git projecten hosten en van allerlei documentatie over git vinden. Van harte aanbevolen. Met name voor het werken in teams zijn Github en Bitbucket perfecte oplossingen. Zolang je project Open-Source is zijn Github en Bitbucket <i>gratis</i> oplossingen.</p>
<h3>Configureren van je Git-omgeving</h3>
<p>Vertel git je naam en emailadres:</p>
<?php
$code = "git config --global user.name \"Jouw volledige naam\"\ngit config --global user.email jouw_adres@ergens.domein";
toon_code_fragment($code,"text");
?>
<p>Git slaat dit op in de git configuratie file: ~/.gitconfig file. Het is een goed idee om de EDITOR omgevingsvariabele van Git te zetten. Dit bepaalt de editor die wordt gestart voor het typen van log berichten.</p>
<img src="basic-git.jpg" style="float:right">
<h2>Een project maken</h2>
<p>Laten we een nieuwe directory (map) aanmaken voor ons eerste project:</p>
<?php
$code = "cd \nmkdir tmp\ncd tmp\nmkdir test1\ncd test1";
toon_code_fragment($code,"text");
?>
<p>Plaats deze directory onder versie controle:</p>
<?php
$code = "git init";
toon_code_fragment($code,"text");
?>
<p>Als je <i>ls -alF</i> tikt op de commandline zie je dat er een .git directory gemaakt is. (Normaal is deze directory 'hidden' vandaar opties -alF die je aan ls meegeven moet.) De git repository voor de directory van dit project staat hierin. Laten we het programmeren aan dit project beginnen.</p>
<p>Tik het volgende in je programma-editor in:</p>
<?php
$code = "<?php\nfor(\$i=0;\$i<10;\$i++) {\n  print \"regel \$i<br>\";\n}\n?>";
toon_code_fragment($code,"text");
?>
<p>En sla het op onder de naam <i>probeersel.php</i>. Probeer of het werkt.</p>
<p>Maak op dezelfde manier een <i>info.php</i> aan met deze inhoud:</p>
<?php
$code = "<?php\nphpinfo();\n?>";
toon_code_fragment($code,"text");
?>
<p>Laten we eens kijken wat git denkt dat we aan het doen zijn:</p>
<?php
$code = "git status";
toon_code_fragment($code,"text");
?>
<p>Git rapporteert dat <i>probeersel.php</i> en <i>info.php</i>"Untracked" zijn. Dit betekent dat Git deze bestanden nog niet bijhoudt. We kunnen <i>probeersel.php</i> toevoegen aan ons project door <i>probeersel.php</i> toe te voegen aan de 'staging area' (de wachtkamer voor nieuwe files):</p>
<?php
$code = "git add probeersel.php";
toon_code_fragment($code,"text");
?>
<p>Geef weer het commando git status. Nu rapporeert dit commando dat <i>probeersel.php</i> een "new file to be commited" is. (Een file die 'committed' is hoort officieel bij een project.) Laten we de file 'committen':</p>
<?php
$code = "git commit";
toon_code_fragment($code,"text");
?>
<p>Git opent de EDITOR zodat je een commit-bericht kunt aanmaken. Een commit bericht beschrijft op de eerste regel beknopt wat je aan het project aan het toevoegen bent. Heb je meer opmerkingen, hou dan de volgende regel leeg en daarna de meer omvangrijkere opmerkingen.</p>
<p>Op dit moment volstaat die ene samenvattende regel. Sla in EDITOR het commit bericht op en sluit de EDITOR af. Git maakt zijn commit nu af en rapporteert: </p>
<?php
$code = "Added probeersel.php.";
toon_code_fragment($code,"text");
?>
<p>Als je nu weer git status ingeeft zul je alleen een melding krijgen over <i>info.php</i>: "Untracked". Over <i>probeersel.php</i> geen woord. Als git niets over een bestand zegt betekent dit dat het bestand wel wordt bijgehouden, maar dat het sinds de laatste commit niet meer gewijzigd is.</p>
<p>We hebben succesvol ons eerste project onder versie controle geplaatst.</p>
<h2>Bestanden veranderen</h2>
<p>Verander <i>probeersel.php</i> bijvoorbeeld op deze manier:<p>
  <?php
  $code = "<?php\nfor(\$i=0;\$i<10;\$i++) {\n  print \"line \$i<br>\";\n}\n?>";
  toon_code_fragment($code,"text");
  ?>
<p>De 'internationale' versie, om het zo te zeggen. Geef weer het commando <i>git status</i>. Git rapporteert dat <i>probeersel.php</i> "Changed but not updated" is. Dit betekent dat sinds de laatste commit het bestand gewijzigd is, maar nog niet in de wachtkamer geplaatst. We kunnen er aan doorwerken zolang we willen. Als we het willen gaan toevoegen aan het project moeten we het wel in de wachtkamer plaatsen. In git kan een bestand alleen toegevoegd worden aan een project vanuit die wachtkamer.</p>
<p>Voordat we dat gaan doen met <i>probeersel.php</i> gaan we kijken naar het verschil tussen het actuele bestand en het bestand zoals dat in het project zit:</p>
<?php
$code = "git diff";
toon_code_fragment($code,"text");
?>
<p>of:</p>
<?php
$code = "git diff --color";
toon_code_fragment($code,"text");
?>
<p>om als het scherm het ondersteunt verschillen in kleur te kunnen zien. De output zal zoiets zijn:</p>
<?php
$code = "-print \"regel \$i<br>\";\n+print \"line \$i<br>\";";
toon_code_fragment($code,"text");
?>
<p>Interpretatie: in het gewijzigde bestand zijn de regels met een '-' verwijderd, en de regels met een '+' toegevoegd.</p>
<p>De volgende stap is het verplaatsen van het gewijzigde bestand naar de staging area, de 'wachtkamer':</p>
<?php
$code = "git add probeersel.php";
toon_code_fragment($code,"text");
?>
<p>In git betekent 'add': verplaats het (gewijzigde) bestand naar de staging area. Het kan dan gaan om een verandering aan een bestaande ('tracked') bestand, maar ook om een geheel nieuw bestand. Dit is soms verwarrend voor wie dit systeem niet gewend is. </p>
<p>Als je nu weer een git diff doet zie je geen veranderingen meer. Het gewijzigde bestand zit nu al in de wachtkamer, git diff let alleen op bestanden die daar nog niet in zitten. Git diff kijkt alleen naar de verschillen tussen de bestanden waar aan gewerkt wordt en de staging area, niet op de verschillen tussen de repository (met de files die ge-commit zijn) en de staging area.</p>
<p>Als je wel het verschil tussen de laatste commit en de staging area wil zien doe je:</p>
<?php
$code = "git diff --cached";
toon_code_fragment($code,"text");
?>
<p>Nu gaan we onze veranderingen (die nu in de staging area zitten) committen, als het ware officieel maken dus. Als het commitbericht een regel is kun je dit ook rechtstreeks op de commandline opgeven:</p>
<?php
$code = "git commit -m \"internationaal bruikbaar gemaakt\"";
toon_code_fragment($code,"text");
?>
<p>Soms wil je de commit-geschiedenis bekijken:</p>
<?php
$code = "git log";
toon_code_fragment($code,"text");
?>
<p>Je kunt een korte samenvatting bij iedere commit geven:</p>
<?php
$code = "git log --stat --summary";
toon_code_fragment($code,"text");
?>
<p>Of je kunt bij een commit de volledige 'verschil geschiedenis' bekijken:</p>
<?php
$code = "git log -p --color";
toon_code_fragment($code,"text");
?>
<p>Die laatste optie <i>--color</i> is optioneel. Deze actie is minder handig bij grote commits.</p>
<h2>Tracked, Modified and Stages</h2>
<p>Ieder bestand in een directory onder git's versie controle is òf tracked òf niet tracked. Een tracked file kan zijn: niet veranderd, veranderd maar nog niet 'staged', of veranderd en 'staged'. Misschien ben je nu in verwarring. Het is de moeite waard dit onderscheid in een limitatieve opsomming op te delen:</p>
<p>Bestanden in een git directory zijn ....
  <ul>
    <li>untracked (bv omdat ze nieuw zijn of je ze bewust wilt negeren)</li>
    <li>tracked maar niet veranderd (ze bestaan al in de repository, <i>git status</i> negeert ze)</li>
    <li>tracked, veranderd maar nog niet 'staged' (ze zijn gewijzigd of nieuw en wachten op een <i>git add</i>)</li>
    <li>tracked, veranderd en 'staged' (deze staan klaar voor een <i>git commit</i>)</li>
  </ul>
De staging area heet ook wel de 'index' van een project.</p>
<h2>Nog meer nuttige git commando's</h2>
<p>Git heeft nog veel meer commando's, soms handig soms onmisbaar bij grote projecten. Dit zijn er een paar:</p>
<p>Om een tracked file te hernoemen:</p>
<?php
$code = "git mv oud-file-naam nieuwe-file-naam";
toon_code_fragment($code,"text");
?>
<p>Om een tracked file uit de repository te verwijderen:</p>
<?php
$code = "git rm file-naam";
toon_code_fragment($code,"text");
?>
<p>De mv en rm commando's doen automatisch een 'staging' (de 'add'), maar je moet nog wel een commit doen!</p>
<p>Als je wijzigingen hebt aangebracht aan een bestand, maar eigenlijk weer terug wilt naar de versie die als laatste gecommit is:</p>
<?php
$code = "git checkout -- file-naam";
toon_code_fragment($code,"text");
?>
<p><b>Opmerking:</b> Dit soort acties is een van de belangrijkste bestaansreden voor versie controle systemen. Je kunt in een dergelijk systeem altijd rustig doordenken en doorwerken aan je programma, maar als je in een doodlopende weg terecht bent gekomen toch altijd weer relatief moeiteloos terugkeren! Reden te meer om altijd heel overdacht om te gaan met commits.</p>
<p>Als de veranderde file - die je dus eigenlijk niet meer wilt - toch al in de staging area staat (je hebt dus al een <i>git add</i> gegeven maar nog geen <i>git commit</i>) moet je iets meer moeite doen en de file 'ont'-stagen:</p>
<?php
$code = "git reset HEAD file-naam";
toon_code_fragment($code,"text");
?>
<p>Er zijn twee manieren om een help-pagina voor een git commando te bekijken, bijvoorbeeld voor het commando <i>status</i>:</p>
<?php
$code = "git help status\nman git-status";
toon_code_fragment($code,"text");
?>
<p>Tot slot, <i>git grep</i> zoekt naar een specifiek patroon in alle files in de repository. Om alle plekken te vinden waar 'print' voorkomt doe je dit:</p>
<?php
$code = "git grep print";
toon_code_fragment($code,"text");
?>
<h2>Een project clonen</h2>
<p>Je hebt een nieuw project gestart in de test1 directory, een file toegevoegd en veranderd. Maar de situatie komt ook vaak voor dat je begint met een bestaande codebase (bijvoorbeeld van je collega, of van een eerder project). Als dat eerdere project onder git versie controle staat kun je het eenvoudig 'klonen' (=een kopie maken die ook weer onder git versie controle staat).</p>
<p>Dat gaat zo. Laten we een directory omhoog gaan en project test1 clonen naar test2 en daarin verder werken:</p>
<?php
$code = "cd ..\ngit clone test1 test2\ncd test2";
toon_code_fragment($code,"text");
?>
<p>Geef het commando <i>ll</i> om te zien dat probeersel.php hier ook bestaat (als kopie). Bovendien, als je <i>git log</i> doet zie je dat de hele commit geschiedenis ook hier bestaat. <i>Git clone</i> kopieert niet alleen de bestanden, maar ook de complete repository en commit geschiedenis. De kloon is kompleet. Vlak na het commando <i>git clone</i> zijn de directories test1 en test2 identiek.</p>
<p>We gaan de zaak compliceren en wat veranderingen aan brengen. We zitten in test2. Wijzig het programma bijvoorbeeld zo:</p>
  <?php
  $code = "<?php\nfor(\$i=0;\$i<100;\$i++) {\n  eggo \"sentence #  \$i<br>\";\n}\n?>";
  toon_code_fragment($code,"text");
  ?>
<p>Dus 100 regels, met echo (bewust fout gespeld..) in plaats van print en een tekst die nu 'sentence # nummer' luidt. </p>
<p>Als we <i>git status</i> intikken zien we dat probeersel.php veranderd is. Dus moeten we 'adden' en 'committen':</p>
<?php
$code = "git add probeersel.php\ngit commit -m \"Aanzienlijke kwantitatieve en tekstuele wijziging van de output\"";
toon_code_fragment($code,"text");
?>
<p>Probeer nu <i>git log</i> om te kijken naar de complete commit geschiedenis. Maar dit commando:</p>
<?php
$code = "git log origin..";
toon_code_fragment($code,"text");
?>
<p>laat alleen maar de commits zien <b>na</b> de cloning. Hier kun je de opties -p en --color aan toevoegen om de diffs ook goed te bekijken:</p>
<?php
$code = "git log -p --color origin..";
toon_code_fragment($code,"text");
?>
<p>We gaan de code weer corrigeren:</p>
<?php
$code = "<?php\nfor(\$i=0;\$i<100;\$i++) {\n  echo \"sentence #  \$i<br>\";\n}\n?>";
toon_code_fragment($code,"text");
?>
<p>En daarna weer adden en committen:</p>
<?php
$code = "git add probeersel.php\ngit commit -m \"Tikfout verbeterd\"";
toon_code_fragment($code,"text");
?>
<p>Hier na zie je met:</p>
<?php
$code = "git log -p --color origin..";
toon_code_fragment($code,"text");
?>
<p>je commitgeschiedenis sinds de kloning groeien.</p>
<h2>Een directory toevoegen aan een repository</h2>
<p>Als je in een git directory een directory maakt en er wat bestanden in plaatst kun je ook een <i>directory</i> 'adden'. Stel je voor dat je in test1 een directory aanmaakt 'testplan' en daar wat bestanden in plaatst. Als je dan dit doet:</p>
<?php
$code = "git add testplan\ngit commit -m \"testplanmap toegevoegd\"";
toon_code_fragment($code,"text");
?>
<p>zul je merken dat alle bestanden in de testmap directory nu gewoon meedoen in de repository (en bijgehouden worden!)</p>
<h2>Veranderingen 'trekken' (pull) van een remote repository</h2>
<p>Stel je voor je hebt een kloon gemaakt van de repository waar je team aan werkt en werkt daarbinnen aan jouw bestanden. De anderen werken ondertussen door aan <i>hun</i> bestanden. Op een gegeven moment zul je hun wijzigingen naar je eigen kloon willen overbrengen. In plaats van alle bestanden handmatig te kopieren kun je dan een git <i>pull request</i> doen:</p>
<?php
$code = "git pull";
toon_code_fragment($code,"text");
?>
<p><i>Git pull</i> kijkt in een bepaalde directory altijd naar de directory waar vandaan je deze directory gekloond hebt, haalt alle veranderingen op die sinds de kloning en voegt die in de kloon in. Daarmee is de gekloonde directory helemaal bijgewerkt.</p>
<p>Juist op dit punt beginnen de git commando's voor gevorderden. Wat gebeurt er bijvoorbeeld als iemand anders ook gewerkt heeft aan bestanden waaraan jij hebt zitten werken en die veranderingen niet helemaal matchen met de jouwe. Wordt jouw file dan overschreven met de zijne? En als dat niet zo is en die ander echt een verbetering heeft aangebracht die jij ook nodig hebt, komt die dan wel door? Voor dit soort commando's en scenario's verwijs ik naar de git documentatie, bijvoorbeeld op <a href="http://git-scm.com/documentation">git-scm</a>.</p>
<?php
include "voet.php";

?>
