<?php
session_start();
$title = "Connexion";
include('./partials/header.php');
?>

<div class="flex items-center justify-center h-screen ">
    <div class="max-w-5xl w-full mx-auto bg-white rounded-xl shadow-2xl overflow-hidden">

        <!-- Flex container for both columns -->
        <div class="flex flex-col md:flex-row ">

            <!-- Left column for login form -->
            <div class="w-full md:w-1/2 flex justify-center items-center bg-white p-12 rounded-l-xl">
                <div class="w-full max-w-md">
                    <div class="flex justify-center mt-10 md:mt-0 mb-10">
                        <img style="width:220px;" src="./assets/logoannuaire.png">
                    </div>

                    <h1 class="text-center font-bold text-3xl mb-10">Connexion</h1>

                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="bg-red-500 text-white text-center p-2 mb-6 rounded">
                            <?php echo $_SESSION['error']; ?>
                            <?php unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="admin/admin_connexion.php" method="POST">
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm mb-2" for="nom_utilisateur">Nom d'utilisateur</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="nom_utilisateur" name="nom_utilisateur" autofocus placeholder="Nom d'utilisateur">
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-600 text-sm mb-2" for="mdp">Mot de passe</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" id="mdp" name="mdp" placeholder="Mot de passe">
                        </div>

                        <div class="flex justify-center mb-6">
                            <a class="inline-block align-baseline font-bold text-sm text-[#533daf] hover:text-[#2A1F58]" href="mdp.php">
                                Mot de passe oublié ?
                            </a>
                        </div>

                        <div class="flex justify-center">
                            <button class="bg-gradient-to-b from-[#533daf] from-30% to-[#2A1F58] to-90% text-white text-lg font-bold px-8 py-2 rounded-xl hover:bg-orange-600" type="submit" value="bconnexion">
                                Connexion
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right column for signup invitation -->
            <!-- This will be displayed below the login form on mobile -->
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-gradient-to-b from-[#533daf] to-[#2A1F58] text-white rounded-t-2xl md:rounded-r-xl md:rounded-t-none p-10 text-center md:text-left md:order-none">
                <h2 class="font-bold text-3xl mb-6">Pas encore membre ?</h2>
                <p class="mb-10 text-center">Vous avez la tête en l'air ?<br>Inscrivez-vous dès maintenant pour avoir votre propre annuaire en ligne !</p>
                <a href="inscription.php" class="border border-white text-white hover:bg-white hover:text-[#533daf] font-bold py-2 px-4 rounded-xl transition duration-300 ease-in-out">
                    Créer un compte
                </a>
            </div>

        </div>
    </div>
</div>

<?php include_once("./partials/footer.php"); ?>