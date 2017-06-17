<?php

include "Poll.php";

class Poll_session extends Poll {
  
   	function maakPoll($id) {
    
   	$this->id=$id;  
   	print "ID is: $id";
    $_SESSION['vraag'] = $this->vraag;
    $_SESSION['antwoord1']="$this->antwoord1"; 	
 	  $_SESSION['antwoord2']="$this->antwoord2"; 	
 	  $_SESSION['antwoord3']="$this->antwoord3"; 	
		$_SESSION['antwoord4']="$this->antwoord4"; 	
		$_SESSION['gestemd1'] = 0;
		$_SESSION['gestemd2'] = 0;
		$_SESSION['gestemd3'] = 0;
		$_SESSION['gestemd4'] = 0;
		$_SESSION['aantalStemmen'] = 0;
		$_SESSION['poll']=$this->id;
 	  	  	
		}
		
		function updatePoll() {
			$id=$this->id;
			$_SESSION['gestemd1'] = $this->gestemd1;
			$_SESSION['gestemd2'] = $this->gestemd2;
			$_SESSION['gestemd3'] = $this->gestemd3;
			$_SESSION['gestemd4'] = $this->gestemd4;
			$_SESSION['aantalStemmen'] = $this->aantalStemmen;
		
		}
		
		function haalOp($id) {
			$this->vraag = $_SESSION['vraag'];
			$this->antwoord1 = $_SESSION['antwoord1'];
			$this->antwoord2 = $_SESSION['antwoord2'];
			$this->antwoord3 = $_SESSION['antwoord3'];
			$this->antwoord4 = $_SESSION['antwoord4'];
			$this->gestemd1 = $_SESSION['gestemd1'];	
			$this->gestemd2 = $_SESSION['gestemd2'];
			$this->gestemd3 = $_SESSION['gestemd3'];
			$this->gestemd4 = $_SESSION['gestemd4'];
			$this->aantalStemmen = $_SESSION['aantalStemmen'];
			$this->id=$_SESSION[$id];
		
		}
		
}




?>