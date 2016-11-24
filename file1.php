<!DOCTYPE html>
<html>
	<head>
		<title>Simpele inlog</title>
	</head>
	<body>
		<h2>Welkom op de inlogpagina</h2>
		<form action="file1_verwerking.php" method="post">
			<table>
				<tr><td>Usernaam:</td><td><input type="text" name="username"></td></tr>
				<tr><td>Wachtwoord:</td><td><input type="password" name="password"></td></tr>
				<tr><td></td><td><input type="submit" name="inloggen" value="inloggen"></td></tr>
			</table>
		</form>
		<h6>Probeer: <i>gast / welkom</i>   of   <i>admin / letmein</i></h6>
	</body>
</html>