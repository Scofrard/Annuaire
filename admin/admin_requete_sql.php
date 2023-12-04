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