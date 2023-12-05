<?php
require 'admin_connexion_db.php';
?>

<!-- INSCRIPTION -->
<!-- INSCRIPTION -->
<!-- INSCRIPTION -->


<?php

function insererUtilisateur($nom, $prenom, $nom_utilisateur, $hashed_password)
{
    global $bdd;
    $sql = "INSERT INTO utilisateur (nom, prenom, nom_utilisateur, mot_de_passe) VALUES (?, ?, ?, ?)";
    $stmt = $bdd->prepare($sql);
    return $stmt->execute([$nom, $prenom, $nom_utilisateur, $hashed_password]);
}

function utilisateurExistant($nom_utilisateur)
{
    global $bdd;
    $sql = "SELECT COUNT(*) FROM utilisateur WHERE nom_utilisateur = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$nom_utilisateur]);
    return $stmt->fetchColumn() > 0;
}

function insererQuestionSecrete($nom_utilisateur, $question_secrete, $reponse)
{
    global $bdd;
    $sqlUtilisateur = "SELECT id FROM utilisateur WHERE nom_utilisateur = ?";
    $stmtUtilisateur = $bdd->prepare($sqlUtilisateur);
    $stmtUtilisateur->execute([$nom_utilisateur]);
    $utilisateur = $stmtUtilisateur->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        $sql = "INSERT INTO question_secrete (utilisateur_id, question_secrete, reponse) VALUES (?, ?, ?)";
        $stmt = $bdd->prepare($sql);
        return $stmt->execute([$utilisateur['id'], $question_secrete, $reponse]);
    } else {
        return false;
    }
}
?>

<!-- CONNEXION -->
<!-- CONNEXION -->
<!-- CONNEXION -->

<?php

function rechercheUtilisateur($nom_utilisateur)
{
    global $bdd;
    $sql = "SELECT * FROM utilisateur WHERE nom_utilisateur = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$nom_utilisateur]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>


<!-- CREER UN CONTACT -->
<!-- CREER UN CONTACT  -->
<!-- CREER UN CONTACT  -->


<?php

function creerContact($userId, $nom, $prenom, $email, $telephone, $adresse)
{
    global $bdd;
    $sql = "INSERT INTO contact (utilisateur_id, nom, prenom, email, telephone, adresse) VALUES (:utilisateur_id, :nom, :prenom, :email, :telephone, :adresse)";
    $stmtUser = $bdd->prepare($sql);

    var_dump($userId);
    exit;
    // Associer chaque marqueur nommé à une variable spécifique
    $stmtUser->bindParam(':utilisateur_id', $userId, PDO::PARAM_INT);
    $stmtUser->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmtUser->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmtUser->bindParam(':email', $email, PDO::PARAM_STR);
    $stmtUser->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $stmtUser->bindParam(':adresse', $adresse, PDO::PARAM_STR);

    // On exécute la requête
    try {
        $stmtUser->execute();
        $message = "Le contact a bien été créé";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        $message = "Une erreur s'est produite";
    }
    return $message;
}

?>