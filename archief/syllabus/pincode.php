<?php

session_start();
if (isset($_POST['submit'])) {
	$pin = md5($_POST['pincode']);
if ($pin == "51c633a9e006ab16093851ada70a9c63") {
	$_SESSION['bekijken']='ok';
	header("Location: index.php");
} else {
	session_unset();
	session_destroy();
}	
}

?>
<!DOCTYPE html>
<html>
<head>
<title>pincode opgeven</title>
<style>
	div.pincode {
		margin-top: 50px;
		margin-left: 50px;
		width: 30%;
		border: 2px solid blue;
		padding: 20px;
		background-color: grey;
		font-family: "verdana";
	}
	
</style>
</head>
<body>
<div class="pincode">
Om toegang te krijgen tot de aantekeningen en uitwerkingen moet je de pincode opgeven die je van de docent hebt gekregen.
<br /><br />

<form action="pincode.php" method="post">
Pincode:<input name="pincode" type="password"><input name="submit" type="submit" value="invoeren">
</form>
</div>
</body>
</html>






