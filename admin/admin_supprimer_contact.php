<!--SUPPRIMER UN CONTACT-->
<!--SUPPRIMER UN CONTACT-->
<!--SUPPRIMER UN CONTACT-->

<?php
include('../partials/header.php');
require("admin_requete_sql.php");
session_start();

//Vérifier que l'id de l'utilisateur existe, sinon renvoyé vers la page d'accueil
if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: connexion.php');
    exit;
}

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];
    $resultat = supprimerContact($contactId);

    if ($resultat === true) {
        //Assurer la redirection vers la page d'accueil lorsque le contact est supprimé
        header('Location: ../accueil.php');
    } else {
        echo "Erreur lors de la suppression du contact";
    }
} else {
    echo "Aucun contact existant";
}
