<!--MODIFIER UN CONTACT-->
<!--MODIFIER UN CONTACT-->
<!--MODIFIER UN CONTACT-->

<?php
include('../partials/header.php');
require("admin_requete_sql.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bModifier'])) {
    $contactId = $_POST['contactId'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];

    $resultat = modifierContact($contactId, $nom, $prenom, $email, $telephone, $adresse);

    if ($resultat === true) {
        header('Location: ../accueil.php'); // Redirection vers la page d'accueil si la modification est réussie
    } else {
        // Afficher un message d'erreur ou le gérer comme vous le souhaitez
        echo "Erreur lors de la modification du contact : " . $resultat;
    }
    exit;
}
?>