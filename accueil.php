<?php
session_start();
$title = "Accueil";
include('./partials/header.php');
require("admin/admin_requete_sql.php");

// Vérifiez si l'utilisateur est connecté et récupérez les contacts
if (isset($_SESSION['id_utilisateur'])) {
    $userId = $_SESSION['id_utilisateur'];
    $contacts = recupererContactsUtilisateur($userId);
} else {
    // Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion
    header('Location: connexion.php');
    exit;
}

?>
<div class="bg-white mt-12 mb-12 pt-10 pb-10 pl-5 pr-5 rounded-xl shadow-2xl sm:mx-auto sm:w-full md:max-w-xl xl:max-w-2xl">

    <div class="flex justify-between items-center ml-5">
        <img style="width:110px; margin-bottom:20px;" src="./assets/logoannuaire.png">
        <form action="admin/admin_deconnexion.php" method="POST">
            <button type="submit" name="bDeconnexion" class="bg-gradient-to-b from-[#533daf] from-30% to-[#2A1F58] to-90% text-white font-bold px-4 py-4 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path fill="#ffffff" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                </svg>
            </button>
        </form>
    </div>

    <h1 class="text-center font-bold text-3xl">Bonjour <?php echo htmlspecialchars($_SESSION["nom_utilisateur"]); ?> </h1>

    <div class="flex justify-between items-center mt-10 ml-5">
        <h2 class="text-center font-bold text-2xl">Contacts</h2>
        <a href="creer_contact.php" class="bg-gradient-to-b from-[#533daf] from-30% to-[#2A1F58] to-90% text-white font-bold px-8 py-2 rounded-xl">Ajouter</a>
    </div>

    <div class="mt-6 sm:mx-auto sm:w-full  md:max-w-xl xl:max-w-2xl">

        <?php foreach ($contacts as $contact) : ?>
            <div class="bg-white p-5 shadow-xl rounded mb-5 border border-[#533daf]">
                <div class="flex justify-between mt-2">
                    <div>
                        <h3 class="font-bold text-lg"><?php echo htmlspecialchars($contact['nom']) . " " . htmlspecialchars($contact['prenom']) ?></h3>
                    </div>
                    <div>

                        <a href="modifier_contact.php?id=<?php echo $contact['id']; ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 mr-2 rounded-full inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                <path fill="#ffffff" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg>
                        </a>
                        <a href="admin/admin_supprimer_contact.php?id=<?php echo $contact['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded-full inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                <path fill="#ffffff" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex">
                    <b>Téléphone : </b>
                    <p class="ml-1"> <?php echo htmlspecialchars($contact['telephone']) ?></p>
                </div>
                <div class="flex">
                    <b>E-mail : </b>
                    <p class="ml-1"> <?php echo htmlspecialchars($contact['email']) ?></p>
                </div>
                <div class="flex">
                    <b>Adresse : </b>
                    <p class="ml-1"> <?php echo htmlspecialchars($contact['adresse']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include_once("./partials/footer.php") ?>