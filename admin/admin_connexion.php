<?php
require 'admin_requete_sql.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_utilisateur = trim($_POST['nom_utilisateur']);
    $password = $_POST['mdp'];
    $erreurs = [];

    $utilisateur = rechercheUtilisateur($nom_utilisateur);

    if ($utilisateur) {
        // Vérifiez si le mot de passe saisi, une fois haché, correspond au hachage MD5 stocké
        if (md5($password) === $utilisateur['mot_de_passe']) {
            // Le mot de passe est correct
            $_SESSION["id_utilisateur"] = $utilisateur["id"];
            $_SESSION["nom_utilisateur"] = $nom_utilisateur;

            // Connexion réussie, rediriger l'utilisateur
            header('Location: ../accueil.php');
            exit;
        } else {
            // Le mot de passe est incorrect
            $erreurs[] = "Mot de passe incorrect";
        }
    } else {
        // Le nom d'utilisateur n'existe pas
        $erreurs[] = "Le nom d'utilisateur n'existe pas";
    }

    if (!empty($erreurs)) {
        $_SESSION['error'] = implode('<br>', $erreurs);
        header('Location: ../connexion.php');
        exit;
    }
}
