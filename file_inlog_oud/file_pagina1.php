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
		<h2>Welkom bij dit voorbeeld!</h2>
		<p>U bent ingelogd als <?php print "$voornaam $tv $achternaam ($email), usernaam: $user";?></p>
		<p>Kies de actie:</p>
		<ul>
			<li><a href="file_uitlog.php">uitloggen</a></li>
			<?php if ($rol==1) {
				print "<li><a href=\"file_useradd.php\">User toevoegen</a></li>";
			} ?>
		</ul>
	</div>
 