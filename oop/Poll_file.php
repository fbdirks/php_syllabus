<?php

include_once "Poll.php";

class Poll_file extends Poll {

// attributen extra voor dit objecttype
		
	// nadenken over de structuur:
	#  id;vraag;antwoord1;antwoord2;antwoord3;antwoord4;gestemd1;gestemd2;gestemd3;gestemd4;aantalStemmen
	#  Ieder bestand bestaat dus uit één regel met alle noodzakelijke informatie er op.

	#  Alternatieven:  per regel een brokje informatie, of vragen en resultaten splitsen!
	#  Dus:
	#		polls.txt:   id;vraag;antwoord1;antwoord2;antwoord3;antwoord4;
	#   results.txt: id;gestemd1;gestemd2;gestemd3;gestemd4;aantalStemmen;
	#  Vergeet in dat laatste geval niet die id die polls en resultaten aan elkaar moet linken!!
	#
	#  In het vervolg kies ik voor één bestand per poll, en heet het bestand naar het id.
	
	

// methoden extra of anders voor dit objecttype
	function maakPoll($id) {
		$location = $id.".poll";
		$fp = fopen("$location", "w" ) ;
		$regel = $this->vraag.";";
		$regel = $regel.$this->antwoord1.";";
		$regel = $regel.$this->antwoord2.";";
		$regel = $regel.$this->antwoord3.";";
		$regel = $regel.$this->antwoord4.";";
		$regel = $regel.$this->gestemd1.";";
		$regel = $regel.$this->gestemd2.";";
		$regel = $regel.$this->gestemd3.";";
		$regel = $regel.$this->gestemd4.";";
		$regel = $regel.$this->aantalStemmen;
		sleep(2); # afdoende vertraging?
		fwrite($fp, $regel);
		fclose($fp);
		
	}
	
	
	function haalOp($id) {
		$location = $id.".poll";
		// print "File is:  $location ";
		$fp = fopen("$location", "rb" ) ;
		$poll = fread($fp, filesize($location));
		$alles = explode(";",$poll);
		$this->id=$id;
		$this->vraag = $alles[0];
		$this->antwoord1 = $alles[1];
		$this->antwoord2 = $alles[2];
		$this->antwoord3 = $alles[3];
		$this->antwoord4 = $alles[4];
		$this->gestemd1 = $alles[5];
		$this->gestemd2 = $alles[6];
		$this->gestemd3 = $alles[7];
		$this->gestemd4 = $alles[8];
		$this->aantalStemmen = $alles[9];
			// print_r($alles);	
		fclose($fp);
	
	}
	
	function updatePoll() {
		$this->MaakPoll($this->id);
	}
	


}



?>

