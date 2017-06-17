<?php

/* 
  Strafregels automaat
*/

?>


<form action="strafregels.php" method="post">
  <table>
    <tr><td>Strafregel:</td><td><input type="text" name="regel" size="80"></td></tr>
    <tr><td>Aantal keer:</td><td><input type="text" name="aantal" value="150"></td></tr>
    <tr><td>Lijn om de ? regels:</td><td><input type="text" name="groep" value="10"></td></tr>
    <tr><td>Regelnummers?</td><td><input type="radio" name="regelnummers" value="ja">ja<br>
                                  <input type="radio" name="regelnummers" value="nee" checked >nee<br></b></td></tr>
  <tr><td>Actie:</td><td><input type="submit" name="actie" value="uitvoeren"></td></tr>
  </table>
  
</form>

<?php
if (isset($_POST['actie'])) {

  $regel = $_POST['regel'];
  $aantal = $_POST['aantal'];
  $groep = $_POST['groep'];
  $regelnummers = $_POST['regelnummers'];
  
  /*
    1. teller met een startwaarde
    2. een eindtest
    3. een verandering
  */
  
  for ($i=0; $i<$aantal; $i++) {
    if ($i % $groep == 0) {
      print "<hr>";
    }
    if($regelnummers=="ja") {
      print "$i ";
    }  
    print "$regel<br>";
  }
  
  print "<br>En nu met WHILE<br>";
  $a = 0;
  $eind = $aantal;
  while ($a < $eind) {
    if ($a % $groep == 0) print "<hr>";
    if ($regelnummers=="ja") print "$a ";
    print "$regel<br>";
    $a++;
  }
}