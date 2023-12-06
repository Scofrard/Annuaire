<!-- AJOUTER UN CONTACT -->
<!-- AJOUTER UN CONTACT -->
<!-- AJOUTER UN CONTACT -->

<?php
$title = "Page de ajout de contacts";
include('../partials/header.php');
require("admin_requete_sql.php");
session_start();

// Vérifier que l'id de l'utilisateur existe, sinon renvoyé vers la page d'accueil
if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: connexion.php');
    exit;
}

$erreur = "";

// Vérifiez si les données du formulaire sont soumises via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bCreer'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $userId = $_SESSION["id_utilisateur"];

    // Validation des champs
    if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($adresse)) {
        $erreur = "Tous les champs sont requis";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "L'adresse email n'est pas valide";
    } else {
        // Appeler la fonction creerContact pour insérer le nouveau contact
        $message = creerContact($userId, $nom, $prenom, $email, $telephone, $adresse);

        if ($message === true) {
            header('Location: ../accueil.php');
            exit;
        } else {
            $erreur = "Erreur lors de l'ajout du contact : " . $message;
        }
    }
    if (!empty($erreur)) {
        $_SESSION['error'] = $erreur;
        header('Location: ../creer_contact.php');
        exit;
    }
}

?>