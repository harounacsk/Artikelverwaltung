<!DOCTYPE html>
<html lang="de">

<head>
	<title>Seite EAN</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/suchform.css">
</head>

<body>
	<?php
	require_once "nav.php";
	?>
	<aside class="aside_width">
		<br>
        <?php
        if (!empty($_GET["_user_id"])) :
            $userController = new UserController();
            if($userController->activeUser($_GET["_user_id"])):
            	echo "<center><h2><font color='#F57D26'> Das User-Konto wurde erfolgreich aktiviert.</font></h2></center>";
            endif;
			$userController->dbClose();
        endif; 
		?>
	</aside>
</body>

</html>