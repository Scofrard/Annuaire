<?php

$title = "Page de connexion";
include('./partials/header.php');

?>

<div class="bg-white pt-10 pb-10 pl-5 pr-5 rounded-xl shadow-2xl sm:mx-auto sm:w-full sm:max-w-sm">

    <h1 class="text-center font-bold text-3xl">Connexion</h1>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <form action="admin/adminconnexion.php" method="POST">
            <div class="mr-4 ml-4 mt-8">
                <label class="block text-gray-600 font-light text-sm mb-1" for="user">Nom d'utilisateur</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="text" id="nom_utilisateur" name="nom_utilisateur">
            </div>

            <div class="mr-4 ml-4 mt-6">
                <label class="block text-gray-600 font-light text-sm mb-1" for="username">Mot de passe</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="password" id="mdp" name="mdp">
            </div>

            <div class="m-4 mt-10 text-center">
                <button type="submit" value="bconnexion" class="bg-gradient-to-b from-[#533daf] from-30% to-[#2A1F58] to-90% text-white text-lg font-bold px-8 py-2 rounded-xl hover:bg-orange-600">Connexion</button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <p>Pas de compte ?</p>
        </div>

        <div class="mt-4 text-center">
            <a href="inscription.php" class="text-gray-400 underline font-light">Créer un compte</a>
        </div>

        <div class="mt-4  text-center">
            <a href="" class="text-gray-400 underline font-light">Mot de passe oublié ?</a>
        </div>

    </div>

</div>


<?php include_once("./partials/footer.php") ?>