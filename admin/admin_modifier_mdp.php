<?php
include('admin_requete_sql.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bConfirmer'])) {
    $nomUtilisateur = $_POST['nom_utilisateur'];
    $question = $_POST['question'];
    $reponse = $_POST['reponse'];
    $nouveauMdp = $_POST['mdp'];
    $confirmationMdp = $_POST['confirm_mdp'];

    $erreurs = [];

    // Vérifier que tous les champs sont remplis
    if (empty($nomUtilisateur) || empty($question) || empty($reponse) || empty($nouveauMdp) || empty($confirmationMdp)) {
        $erreurs[] = "Tous les champs sont requis";
    }

    // Vérifier si les mots de passe correspondent
    if ($nouveauMdp != $confirmationMdp) {
        $erreurs[] = "Les mots de passe ne correspondent pas";
    }

    if (empty($erreurs)) {
        // Vérifier la réponse à la question secrète
        if (verifierQuestionSecrete($nomUtilisateur, $question, $reponse)) {
            // Mise à jour du mot de passe
            if (modifierMotDePasse($nomUtilisateur, $nouveauMdp)) {
                $_SESSION['success'] = "Mot de passe mis à jour avec succès";
                header('Location: ../connexion.php');
                exit;
            } else {
                $erreurs[] = "Erreur lors de la mise à jour du mot de passe";
            }
        } else {
            $erreurs[] = "Réponse à la question secrète incorrecte";
        }
    }

    // Stocker les erreurs dans la session et rediriger vers mdp.php
    if (!empty($erreurs)) {
        $_SESSION['errors'] = $erreurs;
        header('Location: ../mdp.php');
        exit;
    }
}
