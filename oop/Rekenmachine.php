<?php

/**
 * OOP-Calc
 * Rekenmachine op basis van Object Georienteerd PHP
 * Rekenmachine = de interface van de rekenmachine
 */

class Rekenmachine
{
    public $ok;
    public $melding;
    private $g1;
    private $g2;
    private $bewerking;
    private $r;
    
    
    function toon_machine(){
      
        print "<form action=\"".$_SERVER['PHP_SELF']."\" name=\"blok\" method=\"post\">";
        print "<table class=\"rekenmachine\">";
        print "<tr>";
        print "<td>Rekenmachine</td><td></td>";
        print "</tr><tr>";
        print "<td>Getal 1:</td><td><input type=\"text\" name=\"getal1\" class=\"getal\"></td>";
        print "</tr><tr>";
        print "<td>Getal 2:</td><td><input type=\"text\" name=\"getal2\" class=\"getal\"></td>";
        print "</tr><tr>";
        print "<td>Bewerking</td><td>";
        print "<input type=\"submit\" name=\"bewerking\" value=\"+\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"-\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"/\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"*\">";
        print "<br/>";
        print "<input type=\"submit\" name=\"bewerking\" value=\"^\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"&radic;\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"%\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"1/x\">";
        print "</td>";
        print "</tr></table>";
        print "</form>";
    }
    
    
    function invoer_ophalen() {
        $this->g1 = $_POST['getal1'];
        $this->g2 = $_POST['getal2'];
        $this->bewerking = $_POST['bewerking'];
    }
    
    
    function invoer_controle() {
        $this->ok=true;
        $this->melding="<br/>";
        $b=$this->bewerking;
        $ord = ord($b);
        
        if (empty($this->g1)) {
            $this->ok=false;
            $this->melding .= "<br>Getal 1 is <u>leeg</u> of 0.";
        }
        if (!is_numeric($this->g1)) {
            $this->ok=false;
            $this->melding .= "<br>Getal 1 is <u>niet numeriek</u>.";
        }
        if (empty($this->g2)) {
            $this->ok=false;
            $this->melding .= "<br>Getal 2 is <u>leeg</u> of 0.";
        }
        if (!is_numeric($this->g2)) {
            $this->ok=false;
            $this->melding .= "<br>Getal 2 is <u>niet numeriek</u>.";
        }
        if (($this->bewerking=="/")&&($this->g2==0)) {
            $this->ok=false;
            $this->melding .="<br>Bij delen mag het tweede getal <b>niet 0</b> zijn.";
        }
        if (($ord==38)  && ($this->g1 > 0)) {
        		$this->ok=true;
        }
        if (($ord==38)  && ($this->g1 < 0)) {
        		$this->melding ="<br>Wortel trekken van een negatief getal kan niet.";	
        }
        if (($this->bewerking=="1/x") && (is_numeric($this->g1))) {
        		$this->ok=true;
        }
        
        
    }
    
    function berekening_uitvoeren() {
        $s = new Som(); # blauwdruk is ingelezen in hoofdprogramma en dus bekend.
        $s->get_bewerking($this->bewerking);
        $s->get_getallen($this->g1, $this->g2);
        $s->rekenuit();
        $this->r = $s->result();
    }
    
    function toon_resultaat(){
        print "<div align=\"center\"><span class=\"resultaat\">";
        print "$this->g1 $this->bewerking $this->g2 = $this->r <br/>";    
        print "</span></div>";
        
    }
    
    
    function toon_melding() {
    		print "<div class=\"melding\">";
        print "Berekening niet gelukt: $this->melding";    
        print "</div>";
    }
    
    
}

class Rekenmachine2 extends Rekenmachine
{
      
    function toon_machine(){
      
        print "<form action=\"".$_SERVER['PHP_SELF']."\" name = \"hor\" method=\"post\">";
        print "<table class=\"rekenmachine\">";
        print "<tr>";
        print "<td>Rekenmachine</td><td></td>";
        print "</tr><tr>";
        print "<td>Getal 1:</td><td><input type=\"text\" name=\"getal1\" class=\"getal\"></td>";
        print "</tr><tr>";
        print "<td>Getal 2:</td><td><input type=\"text\" name=\"getal2\" class=\"getal\"></td>";
        print "</tr><tr>";
        print "<td>Bewerking</td><td>";
        print "<input type=\"submit\" name=\"bewerking\" value=\"+\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"-\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"/\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"*\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"^\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"&radic;\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"%\">";
        print "<input type=\"submit\" name=\"bewerking\" value=\"1/x\">";
        print "</td>";
        print "</tr></table>";
        print "</form>";
    }
 
 
    
}


?>