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
    $sql = "INSERT INTO contact ( nom, prenom, email, telephone, adresse, utilisateur_id) VALUES ( :nom, :prenom, :email, :telephone, :adresse, :utilisateur_id)";
    $stmtUser = $bdd->prepare($sql);

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
        return true; // Retourne vrai si l'insertion est réussie
    } catch (PDOException $e) {
        return $e->getMessage(); // Retourne le message d'erreur en cas d'échec
    }
}


function recupererContactsUtilisateur($userId)
{
    global $bdd;
    $sql = "SELECT * FROM contact WHERE utilisateur_id = :utilisateur_id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':utilisateur_id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!-- MODIFIER UN CONTACT -->
<!-- MODIFIER UN CONTACT  -->
<!-- MODIFIER UN CONTACT  -->

<?php

function recupererInfoContact($contactId)
{
    global $bdd;
    $sql = "SELECT * FROM contact WHERE id = :contactId";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':contactId', $contactId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function modifierContact($contactId, $nom, $prenom, $email, $telephone, $adresse)
{
    global $bdd;
    $sql = "UPDATE contact SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, adresse = :adresse WHERE id = :contactId";
    $stmtContact = $bdd->prepare($sql);

    $stmtContact->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmtContact->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmtContact->bindParam(':email', $email, PDO::PARAM_STR);
    $stmtContact->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $stmtContact->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $stmtContact->bindParam(':contactId', $contactId, PDO::PARAM_INT);

    try {
        $stmtContact->execute();
        return true; //Retourne vrai si la maj est réussie
    } catch (PDOException $e) {
        return $e->getMessage(); // Retourne le message d'erreur en cas d'échec
    }
}

?>

<!-- SUPPRIMER UN CONTACT -->
<!-- SUPPRIMER UN CONTACT  -->
<!-- SUPPRIMER UN CONTACT  -->

<?php
function supprimerContact($contactId)
{
    global $bdd;
    $sql = "DELETE FROM contact WHERE id = :contactId";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':contactId', $contactId, PDO::PARAM_INT);
    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
?>