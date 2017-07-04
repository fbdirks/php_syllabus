<?php

class optelling{
  private $g1;
  private $g2;
  private $is;
  private $max;
  private $min;
  
  function __construct($niveau) {
    if ($niveau=="A") {
      $this->min = 1;
      $this->max = 100;
    } elseif ($niveau=="B") {
      $this->min = 1;
      $this->max = 200;
    } else {
      $this->min = 0;
      $this->max = 500;
    }
    // Meteen wordt ook de random-som gemaakt:
    $this->genereer_som();
  }
  
  function genereer_som() {
      
      $this->g1 = rand($this->min,$this->max);
      $this->g2 = rand($this->min, $this->max);
      $this->is = $this->g1 + $this->g2;
      
  }
  
  function rapporteer() {
    $terug['g1'] = $this->g1;
    $terug['g2'] = $this->g2;
    $terug['is'] = $this->is;
    return $terug;
  }
  
  function rapporteer_basenaam() {
    return basename(__FILE__);
  }
  
}

/*
  -----------------------------------TEST--------------------------------------------------
    Deze code wordt alleen gestart als de file optelling.php RECHTSTREEKS wordt aangeroepen.
    
    Dit is een voorbeeld van het integreren van een test in de objectcode.
  -----------------------------------------------------------------------------------------
*/

if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) 	{
  
  // deze regels illustreren de werking van bovenstaande test:
  print "de basename van deze file is: ".basename(__FILE__)."<br>";
  print "de basename van \$_SERVER[\"SCRIPT_FILENAME\"] is ".basename($_SERVER["SCRIPT_FILENAME"])."<br>";
  
  /*
    De testcode gaat voor alle drie de moeilijkheidsgraden die mogelijk zijn (A, B en C)
    een random som berekenen en toont deze op scherm (getal1, getal2 en de uitkomst).
    Je kunt nu dus controleren of deze sommen aan alle voorwaarden voldoen.
    
  */
  
  $moeilijkheden = array("A","B", "C");
  print "<br><br>Testoutput: voor alle drie moeilijkheidsgraden wordt een som berekend en getoond.<br>";
  
  foreach ($moeilijkheden as $moeilijkheidsgraad) {
    
    // nieuw opgave object maken
    $opg = new optelling("$moeilijkheidsgraad");
    $som = $opg->rapporteer(); 
  
    // Voor de zekerheid de return array inspecteren: 
    print "De inhoud van \$som  (moeilijkheidsgraad: $moeilijkheidsgraad) : <br>";
    print "<pre>";
    print_r($som);
    print "</pre>";
    
    // Array gewoon gebruiken:
    print "In nette vormgeving:<br>";
    // NB let weer op de syntax rondom de array elementen BINNEN de string.
    print "Maak de volgende som:  {$som['g1']} + {$som['g2']} = ? ( {$som['is']})";  
  }
  
  
  

}