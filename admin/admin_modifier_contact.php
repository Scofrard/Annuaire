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

$erreurs = [];

// Vérifiez si les données du formulaire sont soumises via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bModifier'])) {
    $contactId = $_POST['contactId'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];

    // Validation des champs
    if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($adresse)) {
        $erreurs[] = "Tous les champs sont requis";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email n'est pas valide";
    }

    // Si aucune erreur, procéder à la modification
    if (empty($erreurs)) {
        $resultat = modifierContact($contactId, $nom, $prenom, $email, $telephone, $adresse);

        if ($resultat === true) {
            header('Location: ../accueil.php'); // Redirection vers la page d'accueil si la modification est réussie
            exit;
        } else {
            $erreurs[] = "Erreur lors de la modification du contact : " . $resultat;
        }
    }

    // Stocker les erreurs dans la session et rediriger de nouveau vers le formulaire de modification
    if (!empty($erreurs)) {
        $_SESSION['errors'] = $erreurs;
        header("Location: ../modifier_contact.php?id=" . $contactId);
        exit;
    }
}
?>