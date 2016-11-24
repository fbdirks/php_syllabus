<?php

include_once "Poll.php";
include_once "Databees.php";

class Poll_db extends Poll {
	

    
    function maakPoll($id) {
	      // slaat de poll op in een database
	      $query = "INSERT INTO poll (vraag, antwoord1, antwoord2, antwoord3, antwoord4) VALUES ('$this->vraag', '$this->antwoord1', '$this->antwoord2', '$this->antwoord3', '$this->antwoord4')";
	      $db = new databees();
	    	$res = $db->db_contact($query);
	    	$this->id = mysql_insert_id();
	    	print "Poll toegevoegd onder nummer: $this->id";
	    	$this->haalOp($this->id);
    	}
		
	function checkId() {
			$query = "SELECT id FROM poll WHERE vraag = '$this->vraag'";
			$db = new databees();
	    $r = $db->db_contact($query);
	    $res = mysql_fetch_array($r);
			$cid = $res[0]; #het eerste poll nummer met dezelfde vraag.
			return $cid;
	}
		
		
		function haalOp($id) {
    	// haalt een specifieke poll op in het huidige object.
    	// het is weel zaak de id van de poll te kennen.
    	$query = "SELECT * FROM poll WHERE id=$id";
    	$db = new databees();
	    $r = $db->db_contact($query);
	    	
    	
    	$res = mysql_fetch_array($r);
    	//print_r($res);
	   	$this->id = $res[0];
	    $this->vraag = $res[1];
		$this->antwoord1 = $res[2];
		$this->antwoord2 = $res[3];
		$this->antwoord3 = $res[4];
		$this->antwoord4 = $res[5];
		$this->gestemd1 = $res[6];
		$this->gestemd2 = $res[7];
		$this->gestemd3 = $res[8];
		$this->gestemd4 = $res[9];
		$this->aantalStemmen = $res[10];
	}
    
    function updatePoll() {
    	$query = "UPDATE poll 
    		SET score1 = $this->gestemd1,
			score2 = $this->gestemd2,
    		score3 = $this->gestemd3,
    		score4 = $this->gestemd4,
    		stemmen = $this->aantalStemmen
    		WHERE id = $this->id";
    		$db = new databees();
	    	$res = $db->db_contact($query);
	    	
       	
	}
	
		public static function Poll_beheer() {
		
		if (isset($_POST[muteer])) {
			// de aangeklikte poll op scherm gaan zetten om te wijzigen
			// doorverwijzen naar methode Poll_muteer($id);
			$id = $_POST[muteer];
			print "De te wijzigen poll is: $id.";
			//Poll_muteer($id);
			
		} else {
			// lijst met polls op scherm zetten.
			$query = "SELECT * FROM poll ORDER BY Id DESC";
			$db = new databees();
	    $res = $db->db_contact($query);
	    print "<form action=\"".$_SERVER[PHP_SELF]."\" method=\"post\">";
			print "<table border=\"1\"><tr>";
			print "<td>Id</td><td>Vraag</td><td>Aantal stemmen</td><td>Actie</td></tr>";
			while($result = mysql_fetch_array($res)) {
				print"<tr><td>$result[id]</td><td>$result[vraag]</td><td>$result[stemmen]</td><td><input type=\"submit\" name=\"muteer\" value=\"".$result[id]."\"></td></tr>";
			}
			print "</table>";
			print "</form>";
			
			
		}
		
	}

}
?>
