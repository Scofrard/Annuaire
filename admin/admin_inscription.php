<?php
require 'admin_requete_sql.php';
session_start();

$erreurs = []; // Initialiser un tableau pour les erreurs

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $nom_utilisateur = trim($_POST['nom_utilisateur']);
    $password = $_POST['mot_de_passe'];
    $confirmPassword = $_POST['confirm_mot_de_passe'];
    $question = $_POST['question'];
    $reponse = trim($_POST['reponse']);

    if (empty($nom) || empty($prenom) || empty($nom_utilisateur) || empty($password) || empty($confirmPassword) || empty($question) || empty($reponse)) {
        $erreurs[] = "Tous les champs sont requis";
    }

    if (utilisateurExistant($nom_utilisateur)) {
        $erreurs[] = "Le nom d'utilisateur existe déjà";
    }

    if ($password !== $confirmPassword) {
        $erreurs[] = "Les mots de passe ne correspondent pas";
    }

    // Si aucune erreur n'a été détectée, procéder à l'inscription
    if (empty($erreurs)) {
        $hashed_password = md5($password);

        if (insererUtilisateur($nom, $prenom, $nom_utilisateur, $hashed_password)) {

            if (insererQuestionSecrete($nom_utilisateur, $question, $reponse)) {
                header('Location: ../connexion.php');
                exit;
            } else {
                $erreurs[] = "Erreur lors de l'enregistrement de la question secrète";
            }
        } else {
            $erreurs[] = "Erreur lors de l'inscription";
        }
    }

    // S'il y a des erreurs, les stocker dans la session et rediriger
    if (!empty($erreurs)) {
        $_SESSION['error'] = implode('<br>', $erreurs);
        header('Location: ../inscription.php');
        exit;
    }
}
