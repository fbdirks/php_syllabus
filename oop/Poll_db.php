<?php

include_once "Poll.php";

class Poll_db extends Poll {
	
		// Gegevens die gebruikt worden bij het contacten van de database server
		// Deze komen boven op de gegevens die al in Poll worden bijgehouden.
		private $host;
		private $user;
		private $pass;
		private $database;
		
	
    function __construct() {
       // hier worden de database connectie gegevens ingelezen.
       include_once "db_inc.php";
       $this->host = $hostname;
       $this->user = $username;
       $this->pass = $password;
       $this->database = $database;
    }
    
	function db_contact() {
		// utility functie om contact te leggen met de database.
		$mysqli = new mysqli($this->host,$this->user,$this->pass,$this->database);
		return $mysqli;
	}
    
    function maakPoll() {
      	// Slaat de poll op in een database
      	// Uitgangspunt: het huidige Poll object bevat alle relevante gegevens.
    	$my=$this->db_contact();
    	$query = "INSERT INTO poll (vraag, antwoord1, antwoord2, antwoord3, antwoord4) 
    				VALUES ('$this->vraag', '$this->antwoord1', '$this->antwoord2', 
    										'$this->antwoord3', '$this->antwoord4')";
    	$res = $my->query($query);
		$this->id = mysqli_insert_id($my);
    	print "Poll toegevoegd onder nummer: $this->id";
    	$this->haalOp($this->id);
    	$my->close();
   	}
		
	function checkId() {
		// vindt het Id nummer dat hoort bij de vraag van deze poll.
		$my=$this->db_contact();
		$query = "SELECT id FROM poll WHERE vraag = '$this->vraag'";
		$r = $my->query($query);
	    $res = mysqli_fetch_array($r);
		$cid = $res[0]; #het eerste poll nummer met dezelfde vraag.
		$my->close();
		return $cid;
	}
		
		
	function haalOp($id) {
    	// haalt een specifieke poll op in het huidige object.
    	// het is weel zaak de id van de poll te kennen.
    	$my=$this->db_contact();
    	$query = "SELECT * FROM poll WHERE id=$id";
    	$r = $my->query($query);
	    $res = mysqli_fetch_array($r);
    	//print "<pre>";
    	//print_r($res);
	   	//print "</pre>";
	   	$this->id = $res[0];
	   	$this->actief = $res[1];
	    $this->vraag = $res[2];
		$this->antwoord1 = $res[3];
		$this->antwoord2 = $res[4];
		$this->antwoord3 = $res[5];
		$this->antwoord4 = $res[6];
		$this->gestemd1 = $res[7];
		$this->gestemd2 = $res[8];
		$this->gestemd3 = $res[9];
		$this->gestemd4 = $res[10];
		$this->aantalStemmen = $res[11];
		$my->close();
	}
	
	function wijzigen() {
		// start of een nieuw invoerscherm (nieuwe poll) of 
		// een wijzigscherm voor een bestaande poll.
		if ($_POST['muteer']=="nieuw") {
			$this->NieuwePoll();
		} else {
			$this->haalOp($_POST['muteer']);
			print "<form action=\"".$_SERVER[PHP_SELF]."\" method=\"post\">";
			print "<table>";
			print "<tr><td>Vraag:</td><td><input class=\"invoer\" type=\"text\" name=\"vraag\" value=\"$this->vraag\"></td></tr>";
			print "<tr><td>Antwoord1: </td><td><input class=\"invoer\" type=\"text\" name=\"antwoord1\" value=\"$this->antwoord1\"></td></tr>";
			print "<tr><td>Antwoord2: </td><td><input class=\"invoer\" type=\"text\" name=\"antwoord2\" value=\"$this->antwoord2\"></td></tr>";
			print "<tr><td>Antwoord3: </td><td><input class=\"invoer\" type=\"text\" name=\"antwoord3\" value=\"$this->antwoord3\"></td></tr>";
			print "<tr><td>Antwoord4: </td><td><input class=\"invoer\" type=\"text\" name=\"antwoord4\" value=\"$this->antwoord4\"></td></tr>";
			print "<tr><td></td><td><input class=\"wijzig\" type=\"submit\" name=\"wijzig\" value=\"wijzig\" style=\"width: 55px\"></td></tr>";
			print "</table>";
			print "<input type='hidden' name='actie' value=\"$this->id\">";
			print "</form>";	
		} 
	}
		
	function muteren() {
		//slaat de wijzigingen in de huidige poll op. 
		//print_r($_POST);
		if (isset($_POST['wijzig'])) {
			$this->id = $_POST['actie'];
			$this->vraag=$_POST['vraag'];
			$this->antwoord1=$_POST['antwoord1'];
			$this->antwoord2=$_POST['antwoord2'];
			$this->antwoord3=$_POST['antwoord3'];
			$this->antwoord4=$_POST['antwoord4'];
			//$this->updatePoll();
			$my = $this->db_contact();
			$query = "UPDATE poll SET 
						vraag = '$this->vraag',
						antwoord1 = '$this->antwoord1',
						antwoord2 = '$this->antwoord2',
						antwoord3 = '$this->antwoord3',
						antwoord4 = '$this->antwoord4'
						WHERE id = $this->id";
			//print "De QUery is: $query";# debuggen
			$my->query($query);
			//print "$res"; # debuggen
	  		$my->close(); 
			}
		}
		
		   
	
	function Poll_select() {
		// zet alle pols op het scherm en laat de gebruiker kiezen.
		$my = $this->db_contact();
		$query = "SELECT * FROM poll WHERE actief > 0 ORDER BY Id DESC";
		$res = $my->query($query);
		print "<form action=\"".$_SERVER[PHP_SELF]."\" method=\"post\">";
		print "<table border=\"1\"><tr>";
		print "<td>Id</td><td>Vraag</td><td>Aantal stemmen</td><td>Actie<br>
				<input class=\"wijzig_help\" type=\"button\" value=\"wijzig\">
				<input class=\"deactiveer_help\" type=\"button\" value=\"deactiveer\">
				<input class=\"bekijk_help\" type=\"button\" value=\"bekijk\">
				</td></tr>";
		
		// bestaande polls weergeven + knoppen 'wijzig' en 'deactiveer'
		while($result = mysqli_fetch_array($res)) {
			print("<tr><td>$result[id]</td>
				<td>$result[vraag]</td>
				<td>$result[stemmen]</td>
				<td><input class=\"wijzig\" type=\"submit\" name=\"muteer\" value=\"".$result['id']."\">
				<input class=\"deactiveer\" type=\"submit\" name=\"deactiveer\" value=\"".$result['id']."\">
				<input class=\"bekijk\" type=\"submit\" name=\"bekijk\" value=\"".$result['id']."\">
				</td></tr>");
		}
		
		// knop toevoegen voor het maken van een nieuwe poll
		print "<tr>	<td></td>
				<td>Nieuwe Poll maken</td>
				<td></td>
				<td><input class=\"nieuw\" type=\"submit\" name=\"muteer\" value=\"nieuw\"></td></tr>";
		print "</table>";
		print "</form>";
		$my->close();
	}
	
	function PollInactiefSelect() {
		// zet alle pols op het scherm en laat de gebruiker kiezen.
		$my = $this->db_contact();
		$query = "SELECT * FROM poll WHERE actief = 0 ORDER BY Id DESC";
		$res = $my->query($query);
		print "<form action=\"".$_SERVER[PHP_SELF]."\" method=\"post\">";
		print "<table border=\"1\"><tr>";
		print "<td>Id</td><td>Vraag</td><td>Aantal stemmen</td><td>Actie</td></tr>";
		while($result = mysqli_fetch_array($res)) {
			print"<tr><td>$result[id]</td>
					<td>$result[vraag]</td>
					<td>$result[stemmen]</td>
					<td><input class=\"wijzig\" type=\"submit\" name=\"muteer\" value=\"".$result['id']."\">
					<input class=\"activeer\" type=\"submit\" name=\"activeer\" value=\"".$result['id']."\">
					<input class=\"bekijk\" type=\"submit\" name=\"bekijk\" value=\"".$result['id']."\">
					</td></tr>";
		}
		print "</table>";
		print "</form>";
		$my->close();
	}
	
	
	function PollOpScherm($id) {
		$this->haalOp($id);
		$this-wijzigen();
	}
	
	function Bekijken($id) {
		$this->haalOp($id);
		$this->resultaten();
		print "<br>";
		$this->relatieve_resultaten($id);
	}
	
	
	function NieuwePoll(){
		// nieuw invulscherm voor poll
		if (!isset($_POST['vraag'])) {
			print "<form action=\"".$_SERVER[PHP_SELF]."\" method=\"post\">";
			print "<table>";
			print "<tr><td>Vraag:</td><td><input type=\"text\" name=\"vraag\" ></td></tr>";
			print "<tr><td>Antwoord1: </td><td><input type=\"text\" name=\"antwoord1\"></td></tr>";
			print "<tr><td>Antwoord2: </td><td><input type=\"text\" name=\"antwoord2\"></td></tr>";
			print "<tr><td>Antwoord3: </td><td><input type=\"text\" name=\"antwoord3\"></td></tr>";
			print "<tr><td>Antwoord4: </td><td><input type=\"text\" name=\"antwoord4\"></td></tr>";
			print "<tr><td><input type=\"submit\" name=\"nieuw\" value=\"nieuw\"></td></tr>";
			print "</table>";
			print "<input type='hidden' name='actie' value=\"$this->id\">";
			print "</form>";
		} else {
				$this->vraag = $_POST['vraag'];
				$this->antwoord1 = $_POST['antwoord1'];
				$this->antwoord2 = $_POST['antwoord2'];
				$this->antwoord3 = $_POST['antwoord3'];
				$this->antwoord4 = $_POST['antwoord4'];
				$this->maakPoll();
		}
	}
	
	function updatePoll() {
		// werkt stemming bij.
    	$query = "UPDATE poll 
    		SET score1 = $this->gestemd1,
			score2 = $this->gestemd2,
    		score3 = $this->gestemd3,
    		score4 = $this->gestemd4,
    		stemmen = $this->aantalStemmen
    		WHERE id = $this->id";
    		$my = $this->db_contact();
    		$res = $my->query($query);
	    	
       	
	} 
		
	function DeactiveerPoll() {
		$id = $_POST['deactiveer'];
		$my = $this->db_contact();
		$query = "UPDATE poll SET actief=0 WHERE id = '$id'";
		$res = $my->query($query);
	}
		
	function ActiveerPoll() {
		$id = $_POST['activeer'];
		$my = $this->db_contact();
		$query = "UPDATE poll SET actief=1 WHERE id = '$id'";
		$res = $my->query($query);
		}
	}


?>
