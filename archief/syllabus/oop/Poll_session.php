<?php

include "Poll.php";

class Poll_session extends Poll {
  
   	function maakPoll($id) {
    
   		$this->id=$id;  
    	$_SESSION[$id]['vraag'] = $this->vraag;
    	$_SESSION[$id]['antwoord1']="$this->antwoord1"; 	
 	  	$_SESSION[$id]['antwoord2']="$this->antwoord2"; 	
 	  	$_SESSION[$id]['antwoord3']="$this->antwoord3"; 	
		$_SESSION[$id]['antwoord4']="$this->antwoord4"; 	
		$_SESSION[$id]['gestemd1'] = 0;
		$_SESSION[$id]['gestemd2'] = 0;
		$_SESSION[$id]['gestemd3'] = 0;
		$_SESSION[$id]['gestemd4'] = 0;
		$_SESSION[$id]['aantalStemmen'] = 0;
		$_SESSION['poll']=$this->id;
		
    	  	  	
		}
		
		function updatePoll() {
			$id=$this->id;
			$_SESSION[$id]['gestemd1'] = $this->gestemd1;
			$_SESSION[$id]['gestemd2'] = $this->gestemd2;
			$_SESSION[$id]['gestemd3'] = $this->gestemd3;
			$_SESSION[$id]['gestemd4'] = $this->gestemd4;
			$_SESSION[$id]['aantalStemmen'] = $this->aantalStemmen;
		
		}
		
		function haalOp($id) {
		
			$this->vraag = $_SESSION[$id]['vraag'];
			$this->antwoord1 = $_SESSION[$id]['antwoord1'];
			$this->antwoord2 = $_SESSION[$id]['antwoord2'];
			$this->antwoord3 = $_SESSION[$id]['antwoord3'];
			$this->antwoord4 = $_SESSION[$id]['antwoord4'];
			$this->gestemd1 = $_SESSION[$id]['gestemd1'];	
			$this->gestemd2 = $_SESSION[$id]['gestemd2'];
			$this->gestemd3 = $_SESSION[$id]['gestemd3'];
			$this->gestemd4 = $_SESSION[$id]['gestemd4'];
			$this->aantalStemmen = $_SESSION[$id]['aantalStemmen'];
			$this->id=$_SESSION[$id];
		
		}
		
}




?>