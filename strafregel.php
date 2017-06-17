<?php 
  /* strafregel programma */
?>

<form action="strafregel.php" method="post">
  Regel: <input type="text" name="regel" size="80"><br>
  Aantal: <input type="text" name="aantal" value="150"><br>
  Groep: <input type="text" name="groep" value="10"><br>
  Regelnr: <input type="radio" name="regelnummers" value="ja">Ja 
           <input type="radio" name="regelnummers" value="nee" checked >Nee<br>
  <input type="submit" name="actie" value="verzenden">
</form>

<?php
if(isset($_POST['actie'])) {
  
  $regel = $_POST['regel'];
  $aantal = $_POST['aantal'];
  $groep = $_POST['groep'];
  $regelnummers = $_POST['regelnummers'];
  
  /* FOR loop  
    1. Een teller met een startwaarde
    2. Een eindtest
    3. Een verandering van de teller
  */
  
  for($i=0; $i<$aantal; $i++ ) {
  
    if($i % $groep == 0) {
      echo "<hr>";
    } 
  
    if ($regelnummers == "ja") {
      echo "$i ";
    }
    
    echo "$regel<br>";
  }
  
  echo "En nu met de While...<br>";
  
  $a=0; // Dit moet je apart doen!!
  
 
  
  while($a<$aantal) {
    
    if($a % $groep == 0) {
      echo "<hr>";
    } 
  
    if ($regelnummers == "ja") {
      echo "$a ";
    }
    
    echo "$regel<br>";
    
    $a++; // Ook dit moet nu apart!!!
  }
  
  

  
  
  
}
?>