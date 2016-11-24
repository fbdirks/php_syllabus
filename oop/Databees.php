<?php

	class databees {
		private $db_pass = "poll";
		private $db_name = "poll";
		private $db_user = "poll";
		
		public function db_contact($query) {
			$sql = mysql_connect("localhost",$this->db_user,$this->db_pass) or die ("MySQL niet te bereiken");
			$mysql = mysql_select_db($this->db_name, $sql);
			$resultaat = mysql_query($query,$sql);
			return $resultaat;
		}
		
		public function db_close() {
		}
		
	}
	
	?>
	
		