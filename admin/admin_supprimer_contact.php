<?php
include('../partials/header.php');
require("admin_requete_sql.php");
session_start();

if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: connexion.php');
    exit;
}

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];
    $resultat = supprimerContact($contactId); // Assurez-vous d'avoir cette fonction dans admin_requete_sql.php

    if ($resultat === true) {
        header('Location: ../accueil.php');
    } else {
        echo "Erreur lors de la suppression du contact.";
    }
} else {
    echo "Aucun ID de contact fourni.";
}
