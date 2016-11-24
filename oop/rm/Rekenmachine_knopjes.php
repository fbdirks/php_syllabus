<?php

/*
	De Rekenmachine_knopjes implementeert een variant van de rekenmachine waarbij de rekenmachine
	zelf ook de numerieke toetsen bevat.
	Deze implementatie is in PHP. Het is helemaal geen gek idee om dit ook in Javascript te proberen.
	Nog weer een andere insteek zou kunnen zijn het gebruiken van een bibliotheek (js of php) die een
	toetsenbord levert. 
*/





require_once("Rekenmachine.php"); # nodig omdat Rekenmachine_knopjes daarop voortbouwt!

class Rekenmachine_knopjes extends Rekenmachine
{
    private $cijfer;
    private $toestand;
    private $operatie;
    //private $bewerking;
    private $actie;
    private $ge1;
    private $ge2;
	
   
    
    function __construct() {
    	$this->toestand = "getal1";
    	$this->g1 = 0;
    	$this->g2 = 0;
    	$this->r = "";
    	$this->operatie = "+";
    }
    
    function toon_machine(){
    		$this->toestand_ophalen();
    		$this->berekening_uitvoeren();
    		      
        ?>
         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name = "knopjes" method="post">
         <table class="rekenmachine">
         <tr>
         <td>Getal 1:</td><td><input type="text" name="getal1" class="getal" value="<?php echo $this->g1;?>"></td>
         </tr><tr>
         <td>Getal 2:</td><td><input type="text" name="getal2" class="getal" value="<?php echo $this->g2;?>"></td>
         </tr><tr>
         <td>Bewerking</td><td>
         <input type="submit" name="bewerking" value="+">
         <input type="submit" name="bewerking" value="-">
         <input type="submit" name="bewerking" value="/">
         <input type="submit" name="bewerking" value="*"><br>
         <input type="submit" name="bewerking" value="^">
         <input type="submit" name="bewerking" value="&radic;">
         <input type="submit" name="bewerking" value="%">
         <input type="submit" name="bewerking" value="1/x"><br>
		 </td>
         </tr><tr>
		 <td>Berekening</td>
		 <td>
		 <input type="submit" name="bewerking" value="=">
		 <!--
		 <input type="submit" name="bewerking" value="->"> Geheugen manipulaties. TODO
		 //-->
         </td>
		 </tr>
		 <!--
		 <tr>
		 <td>Precisie</td>
		 <td>
		 <input type="radio" name="afronden" value="n">nee
		 <input type="radio" name="afronden" value="y">ja<br>
		 0<input type="range" min="0" max="8" name="precisie">8
		 </td>
		 </tr>
		 //-->
         <tr>
         	<td>Toetsenbord</td>
         	<td>
         		<input type="submit" name="bewerking" value="0">
         		<input type="submit" name="bewerking" value="1">
         		<input type="submit" name="bewerking" value="2">
         		<input type="submit" name="bewerking" value="3">
         		<input type="submit" name="bewerking" value="4">
         		<input type="submit" name="bewerking" value="5"><br>
         		<input type="submit" name="bewerking" value="6">
         		<input type="submit" name="bewerking" value="7">
         		<input type="submit" name="bewerking" value="8">
         		<input type="submit" name="bewerking" value="9">
         		<input type="submit" name="bewerking" value=".">
         		<input type="submit" name="bewerking" value="C">
         
         		<input type="hidden" name="operatie" value="<?php echo $this->operatie;?>">
						<input type="hidden" name="ge1" value="<?php echo $this->g1;?>">
						<input type="hidden" name="ge2" value="<?php echo $this->g2;?>">
						<input type="hidden" name="toestand" value="<?php echo $this->toestand;?>">
         	</td>
         	
         </tr>
         </tr></table>
         
         </form>
        
        <?php
    }
    
    
 
 		function toestand_ophalen() {
      if (isset($_POST)) {  
        
        if (isset($_POST['getal1'])) $this->g1 = $_POST['getal1'];
        if (isset($_POST['getal2'])) $this->g2 = $_POST['getal2'];
        if (isset($_POST['operatie'])) $this->operatie = $_POST['operatie'];
        if (isset($_POST['toestand'])) $this->toestand = $_POST['toestand'];
        
                
        if (isset($_POST['bewerking'])) {
        	switch($_POST['bewerking']) {
        		case (is_numeric($_POST['bewerking'])):
        			$this->actie = "cijfer";
        			break;
        		case ("0"):      	
        			$this->actie = "cijfer";
        			break;
        		case ("."):
        			$this->actie = "cijfer";
        			break;
        		case ("=") :
        			$this->actie = "uitrekenen";
        			break;
        		case ("C"): 
        			$this->actie = "wissen";
        			break;
        		default:
        			$this->actie = "bewerking";
        			break;
        	}
        	//print "Wat moet ik doen? <b>$this->actie</b>";        	
        	
        }
 		  }
    }
       
    
 
 		function invoer_ophalen() {
		// lege functie bij deze rekenmachine omdat er bij 'tonen' al werk gedaan moest worden. 
				
    }
    
    function invoer_verwerken() {
    		// acties
        
    }
    
    function invoer_controle() {
        if ($this->actie=="uitrekenen") {
	        $this->ok=true;
	        $this->melding="<br/>";
	        $b=$this->bewerking;
	        $ord = ord($b);
	        
	        /*
	        	Foutmeldingen bouwen hier op, het zou anders kunnen..
	        */
	        
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
        } // alleen doen als er uitgerekend moet worden, niet eerder!!
        
    }
    
    function berekening_uitvoeren() {
    	//print "<hr>Ik moet: $this->actie<br>";
    		if ($this->actie=="cijfer") {
        	// getallen ophalen, cijfer ophalen en cijfer toevoegen.
       		
       		if ($this->toestand=="opnieuw") {
       			$this->g1 = 0;
       			$this->g2 = 0;
       			$this->bewerking="+";
       			$this->toestand="getal1";
       		}
       		
       		if ($this->toestand=="getal1") {
       			$oud = $this->g1;
       			
       			$this->g1 = $this->g1.$_POST['bewerking'];
       			if ($oud==0) $this->g1 = $this->g1 + 0;
       		} else {
       			$oud = $this->g2;
       			$this->g2 = $this->g2.$_POST['bewerking'];
       			if ($oud==0) $this->g2 = $this->g2 + 0;
       		}
        } elseif( $this->actie=="bewerking") {
        	// bewerking in bewerkingsveldje plaatsen
        	$this->operatie = $_POST['bewerking'];
        	$this->toestand = "getal2";
        } elseif($this->actie=="wissen") {
        	$this->g1 = 0;
        	$this->g2 = 0;
        	$this->operatie="+";
        	$this->toestand="getal1";
        } else {
        	$operatie = $this->operatie;
        	$s = new Som($operatie,$this->g1,$this->g2); # blauwdruk is ingelezen in hoofdprogramma en dus bekend.
        	$s->rekenuit();
        	//$this->r = $s->result();
			$this->resultaat= $s->result();
			$this->r = $this->resultaat['resultaat'];
			$this->g1 = $this->resultaat['g1'];
			$this->g2 = $this->resultaat['g2'];
        	$this->toestand = "opnieuw";
        	
    	
    	}
    		
    }
    
	
    function toon_melding() {
    	if ($this->actie=="uitrekenen") {
    		
    		print "<div class=\"melding\">";
        print "Berekening niet gelukt: $this->melding";    
        print "</div>";
      } else {
        print "<div align=\"center\"><div class=\"resultaat\">";
	      print " $this->operatie  <br/>";    
	      print "</span></div>";
	    
      }
      // alleen doen als er uitgerekend gaat worden.!
    }
    
    function toon_resultaat() {
	    if ($this->actie=="uitrekenen") {
	        //print "Actie: $this->actie<br>";
	        print "<div align=\"center\"><div class=\"resultaat\">";
	        print "$this->g1 $this->operatie $this->g2 = $this->r <br/>";    
	        print "</span></div>";
	    } else {
	    	  print "<div align=\"center\"><div class=\"resultaat\">";
	        print " $this->operatie  <br/>";    
	        print "</span></div>";
	    }
    }
    
    // Deze functie was van belang bij het uittesten van deze klasse.
    function toestand_tonen() {
    	print "Getal 1: $this->g1  ($_POST[ge1])<br>";
    	print "Getal 2: $this->g2  ($_POST[ge2])<br>";
    	print "Bewerking: $this->operatie<br>";
    	print "Cijfer: $this->cijfer<br>";
    	print "Toestand: $this->toestand<br>";
  		print "Actie: $this->actie<br>";
    }
    
}

// Dit is testcode.
// Deze code werkt alleen als de pagina rechtstreeks aangeroepen wordt.

if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) 	{   
	
	include_once "Som.php";
	$rm = new Rekenmachine_knopjes();
	$rm->toon_machine();

	// Zet de verschillende methoden aan het werk:
	if (isset($_POST['bewerking'])) {
		$rm->invoer_ophalen();
		$rm->invoer_controle();
	   
		if ($rm->ok) {
			$rm->berekening_uitvoeren();
			$rm->toon_resultaat();
		} else {
			$rm->toon_melding();
		}
	}
} 

?>