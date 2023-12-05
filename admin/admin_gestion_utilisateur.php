<?php

$title = "Page de gestion des contacts";
include('../partials/header.php');
require("admin_requete_sql.php");
session_start();
?>

<!-- AJOUTER UN CONTACT -->
<!-- AJOUTER UN CONTACT -->
<!-- AJOUTER UN CONTACT -->

<?php

// Vérifiez si les données du formulaire sont soumises via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bCreer'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $userId = $_SESSION["id_utilisateur"];

    // Appeler la fonction creerContact pour insérer le nouveau contact
    $message = creerContact($userId, $nom, $prenom, $email, $telephone, $adresse);

    header('Location: ../accueil.php');
    exit;
} else {
    // Rediriger vers le formulaire de création si la page est accédée sans soumission de formulaire
    header('Location: ../creer_contact.php');
    exit;
}
?>


<!--MODIFIER UN CONTACT-->
<!--MODIFIER UN CONTACT-->
<!--MODIFIER UN CONTACT-->


<!--SUPPRIMER UN CONTACT-->
<!--SUPPRIMER UN CONTACT-->
<!--SUPPRIMER UN CONTACT-->