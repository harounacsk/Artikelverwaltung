<?php
require_once "../php/controller/Database.php";
require_once "../php/controller/UserController.php";

/**
 * Überpruft ob der Benutzer sich eingeloggt hat
 */
if (!UserController::isConnected()) {
    // Dann leitet auf die einloggen Datei.
    header("Location: ../index.php");
    exit();
}
