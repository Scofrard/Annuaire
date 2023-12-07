<?php
require 'admin_requete_sql.php';
session_start();

//Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['id_utilisateur'])) {
    $_SESSION['error'] = "Vous devez être connecté pour importer des contacts";
    header("Location: ../connexion.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_upload'])) {
    $file = $_FILES['csv_upload'];

    if (strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)) != 'csv') {
        $_SESSION['error'] = "Le fichier doit être un CSV.";
        header("Location: ../creer_contact.php");
        exit;
    }

    $userId = $_SESSION['id_utilisateur'];
    $rowNumber = 0;
    $successfulImports = 0;
    $errorsDuringImport = [];

    if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $rowNumber++;
            if ($rowNumber == 1) {
                //  Passer la premiière colonne
                continue;
            }
            // S'assurer que les colonnes du csv sont id, nom, prenom, email, telephone, adresse, utilisateur_id
            $nom = $data[1];
            $prenom = $data[2];
            $email = $data[3];
            $telephone = $data[4];
            $adresse = $data[5];

            $result = creerContact($userId, $nom, $prenom, $email, $telephone, $adresse);
            if ($result !== true) {
                // Enregistrer les lignes ou se trouve des erreurs
                $errorsDuringImport[] = "Erreur à la ligne $rowNumber: $result";
            } else {
                $successfulImports++;
            }
        }
        fclose($handle);

        if (count($errorsDuringImport) > 0) {
            // Afficher les erreurs
            $_SESSION['error'] = implode('<br>', $errorsDuringImport);
            header("Location: ../creer_contact.php");
            exit;
        } else {
            $_SESSION['success'] = "$successfulImports contacts importés avec succès";
            header("Location: ../accueil.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Erreur lors de l'ouverture du fichier CSV";
        header("Location: ../creer_contact.php");
        exit;
    }
}
