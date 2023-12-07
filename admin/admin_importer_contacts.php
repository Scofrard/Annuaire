<?php
require 'admin_requete_sql.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_upload'])) {
    $file = $_FILES['csv_upload'];

    if (strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)) != 'csv') {
        $_SESSION['error'] = "Le fichier doit être un CSV.";
        header("Location: ../creer_contact.php");
        exit;
    }

    if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Supposer que les colonnes du CSV sont nom, prenom, email, telephone, adresse
            $result = creerContact($_SESSION['id_utilisateur'], $data[0], $data[1], $data[2], $data[3], $data[4]);
            if (!$result) {
                $_SESSION['error'] = "Erreur lors de l'importation d'un contact.";
                header("Location: ../creer_contact.php");
                exit;
            }
        }
        fclose($handle);
        $_SESSION['success'] = "Contacts importés avec succès.";
    } else {
        $_SESSION['error'] = "Erreur lors de l'ouverture du fichier.";
        header("Location: ../creer_contact.php");
        exit;
    }

    header("Location: ../accueil.php");
    exit;
}
