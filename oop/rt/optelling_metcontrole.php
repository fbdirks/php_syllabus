<?php

class optelling{
  private $g1;
  private $g2;
  private $is;
  private $max;
  private $min;
  private $count;
  
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
    $this->count= 0;
    // Meteen wordt ook de random-som gemaakt:
    $this->genereer_som();
  }
  
  function genereer_som() {
      $this->count++; # geeft een indicatie van hoe vaak de methode gebruikt is
      $this->g1 = rand($this->min,$this->max);
      $this->g2 = rand($this->min, $this->max);
      $this->is = $this->g1 + $this->g2;
      while ($this->is > $this->max) {
        $this->genereer_som();
      }
      
    
  }
  
  function rapporteer() {
    $terug['g1'] = $this->g1;
    $terug['g2'] = $this->g2;
    $terug['is'] = $this->is;
    $terug['count']=$this->count;
    return $terug;
  }
  
}


// Deze code wordt alleen gestart als de file optelling.php RECHTSTREEKS wordt aangeroepen.

if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) 	{
  
  $moeilijkheden = array("A","B", "C");
  
  foreach ($moeilijkheden as $moeilijkheidsgraad) {
    
    // nieuw opgave object maken
    $opg = new optelling("$moeilijkheidsgraad");
    $som = $opg->rapporteer(); 
  
    // Voor de zekerheid de return array inspecteren: 
    print "<br>De inhoud van \$som  (moeilijkheidsgraad: $moeilijkheidsgraad) : <br>";
    print "<pre>";
    print_r($som);
    print "</pre>";
    
    // Array gewoon gebruiken:
    print "In nette vormgeving:<br>";
    print "Maak de volgende som:  {$som['g1']} + {$som['g2']} = ? ({$som['is']})";  
    print "<br>Gevonden in {$som['count']} tries.";
  }
  
  //  https://alexnisnevich.github.io/untrusted/

}