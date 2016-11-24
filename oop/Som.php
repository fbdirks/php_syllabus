<?php

/**
 * SOM: de wiskundige uitwerking van een berekening
 * Alle interface elementen en controles zitten in Rekenmachine!
 * Deze klasse kan zich volledig concentreren op het rekenwerk.
 */

class Som {
    private $g1;
    private $g2;
    private $bewerking;
    private $resultaat;
    
    function get_bewerking($b) {
        $this->bewerking = $b;
    }
    
    function get_getallen($a,$b) {
        $this->g1 = $a;
        $this->g2 = $b;    
    }
    
    function rekenuit() {
        
        switch($this->bewerking) {
            case "+": 
                $this->resultaat = $this->g1 + $this->g2;    
                break;
            case "-":
                $this->resultaat = $this->g1 - $this->g2;    
                break;
            case "*": 
                $this->resultaat = $this->g1 * $this->g2;    
                break;
            case "/": 
                $this->resultaat = $this->g1 / $this->g2;    
                break;
           	case "^": 
                $this->resultaat = pow($this->g1,$this->g2);    
                break;
            case ord($this->bewerking)==38: 
            	  $this->resultaat = sqrt($this->g1);    
                break;
            case "%": 
                $this->resultaat = $this->g1 * ($this->g2/100);    
                break;
            case "1/x": 
              	$this->resultaat = 1/$this->g1;    
                break;
        }
    }
    
    function result() {
       return $this->resultaat;
    }
}

?>