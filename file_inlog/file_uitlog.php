<?php

session_start();
// deze ingewikkelde voorwaarde kijkt of $_SESSION['ingelogd'] gezet en TRUE is.
if (!((isset($_SESSION['ingelogd']))&& ($_SESSION['ingelogd']==true))) { 
	header("Location: file_inlog.php");
	exit();
} else {
	$user = $_SESSION['usernaam'];
	$voornaam = $_SESSION['voornaam'];
	$tv = $_SESSION['tv'];
	$achternaam = $_SESSION['achternaam'];
	$email = $_SESSION['email'];
	$rol = $_SESSION['rol'];
} 

?>

<head>
<title>FileFuncties PHP</title>
<link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
<link rel="stylesheet" href="file_stijl.css">
</head>
<body>
	<div class="main">
		<h2>De uitlogpagina.</h2>
		<p>U was ingelogd als <?php print "$voornaam $tv $achternaam ($email), usernaam: $user";?></p>
		<?php 
			session_unset();
			session_destroy();
		?>
		<p>U bent nu uitgelogd.<br><a href="file_inlog.php">Probeer het nog eens.</a></p>