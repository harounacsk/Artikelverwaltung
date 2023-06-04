<?php
session_start();
if(session_destroy()) { // wenn Session beendet ist
    header("Location: ../index.php"); // leitet auf die Seite index.php
}
