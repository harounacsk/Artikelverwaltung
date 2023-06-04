<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/resp_table.css">
	<script type="text/javascript" src="../js/art_lief.js" defer></script>
    <title>Users</title>
</head>

<body>
    <?php
    require_once "../php/controller/database.php";
    require_once "../php/controller/UserController.php";
    require_once "auth.php";
	require_once "nav.php";
    $userController = new UserController();
    $rows = $userController->getUnenabledUsers();
    if(UserController::isAdmin()):
        if (!empty($rows)):
    ?>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Benutzer</th>
                <th>Kurz</th>
                <th>Roles</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) : ?>
                <tr>
                    <td data-label="ID"><?= $row["user_id"]; ?></td>
                    <td data-label="Benutzer"><?= $row["name"]; ?></td>
                    <td data-label="Kurz"><?= $row["username"]; ?></td>
                    <td data-label="Roles"><?= $row["roles"]; ?></td>
                    <?php
                    if (UserController::isSuperAdmin()) :
                        $url="enable_user.php?_user_id=". $row["user_id"];
                    ?>
                    <td data-label="Löschen"><a href="<?= $url?>"><?= "Aktivieren"; ?></td>
                    <?php
                    endif;
                    ?>

                </tr>
            <?php
            endforeach;
        else : echo "<center><h2><font color='#F57D26'><i>Es gibt noch keinen Benutzer, der aktiviert werden soll.</i></font></h2></center>";
                
        endif;
    else: echo "<center><br><h2><font color='#F57D26'><i>Sie haben keine Admin Rechte. </i></font></h2></center>";
    endif;
    
    $userController->dbClose()?>
        </tbody>
    </table>
</body>

</html>