<!--MODIFIER UN CONTACT-->
<!--MODIFIER UN CONTACT-->
<!--MODIFIER UN CONTACT-->

<?php
include('../partials/header.php');
require("admin_requete_sql.php");
session_start();

//Vérifier que l'id de l'utilisateur existe, sinon renvoyé vers la page d'accueil
if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: connexion.php');
    exit;
}

// Vérifiez si les données du formulaire sont soumises via POST
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
        // Afficher un message d'erreur
        echo "Erreur lors de la modification du contact : " . $resultat;
    }
    exit;
}
?>