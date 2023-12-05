<?php
require 'admin_requete_sql.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_utilisateur = trim($_POST['nom_utilisateur']);
    $password = $_POST['mdp'];
    $erreurs = [];

    $utilisateur = rechercheUtilisateur($nom_utilisateur);
    $_SESSION["id_utilisateur"] = $utilisateur["id"];

    if (!$utilisateur) {
        $erreurs[] = "Le nom d'utilisateur n'existe pas";
    } elseif (md5($password) !== $utilisateur['mot_de_passe']) {
        $erreurs[] = "Mot de passe incorrect";
    }

    if (empty($erreurs)) {
        // Connexion réussie, rediriger l'utilisateur
        header('Location: ../accueil.php');
        exit;
    } else {
        $_SESSION['error'] = implode('<br>', $erreurs);
        header('Location: ../connexion.php');
        exit;
    }
}
