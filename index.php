<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0  maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>Einloggen</title>

	<link rel="stylesheet" type="text/css" href="css/loggen.css">
</head>

<body>
	<header>
		<h3>Anmeldung</h3>
	</header>

	<aside>

		<center>
			<form action="" method="post" name="einloggen">

				<label><i><b>Benutzer :</b></i></label>
				<input type="text" name="username" placeholder="Bitte geben Sie hier Ihr Benutzer ein" maxlength="2" required /><br><br>
				<label><i><b>Kennwort: </b></i></label>
				<input type="password" name="password" placeholder="Bitte geben Sie hier Ihr Kennwort ein" required /><br>
				<input name="submit" type="submit" value="Einloggen" />
			</form>
		</center>
		<?php
		if (!empty($_POST)) {
			require_once 'php/controller/database.php';
			require_once "php/controller/UserController.php";
		
			$username = $_POST['username'];
			$password = $_POST['password'];
		
			$userController = new UserController();
			$userController->login($username, $password);	
		
			if (UserController::isConnected()) {
				header("Location: vue/home.php"); // leitet auf die Datei startseite.php
				exit();
			} else {
				echo "<center><h4><i>Die eingegebene Benutzername oder Passwort sind falsch .</i></h4></p><br/></center>";
			}
		}
		
		?>
	</aside>
	<!--<footer>Copyright © 2021 </footer>-->
</body>

</html>