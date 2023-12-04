<?php
$title = "Admin-logout";
session_start();
session_destroy();
header('Location: ../connexion.php');
exit;
