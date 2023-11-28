<?php

$title = "Page d'inscription";
include('./partials/header.php');

?>

<div class="bg-white pt-10 pb-10 pl-5 pr-5 rounded-xl shadow-2xl sm:mx-auto sm:w-full sm:max-w-sm">

    <h1 class="text-center font-bold text-3xl">Inscription</h1>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <form action="admin/admininscription.php" method="POST">
            <div class="mr-4 ml-4 mt-8">
                <label class="block text-gray-600 font-light text-sm mb-1" for="nom">Nom</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="text" id="nom" name="nom">
            </div>

            <div class="mr-4 ml-4 mt-6">
                <label class="block text-gray-600 font-light text-sm mb-1" for="prenom">Prénom</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="text" id="prenom" name="prenom">
            </div>

            <div class="mr-4 ml-4 mt-6">
                <label class="block text-gray-600 font-light text-sm mb-1" for="nom_utilisateur">Nom d'utilisateur</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="text" id="nom_utilisateur" name="nom_utilisateur">
            </div>

            <div class="mr-4 ml-4 mt-6">
                <label class="block text-gray-600 font-light text-sm mb-1" for="password">Mot de passe</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="password" id="mdp" name="mdp">
            </div>

            <div class="mr-4 ml-4 mt-6">
                <label class="block text-gray-600 font-light text-sm mb-1" for="confirm_mdp">Confirmation mot de passe</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="password" id="confirm_mdp" name="confirm_mdp">
            </div>

            <div class="mr-4 ml-4 mt-6 mb-4">
                <label class="block text-gray-600 font-light text-sm mb-1" for="question">Question secrète</label>
                <select class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" id="question" name="question">
                    <option value="select_question" disabled selected>Sélectionnez une question</option>
                    <option value="question1">Quel est le nom de votre premier animal de compagnie ?</option>
                    <option value="question2">Quelle est la ville de naissance de votre mère ?</option>
                    <option value="question3">Quel est le nom de votre professeur préféré ?</option>
                </select>
            </div>

            <div class="mr-4 ml-4 mt-6">
                <label class="block text-gray-600 font-light text-sm mb-1" for="reponse">Réponse</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="text" id="reponse" name="reponse" placeholder="Réponse">
            </div>

            <div class="m-4 mt-10 text-center">
                <button type="submit" value="bconnexion" class="bg-gradient-to-b from-[#533daf] from-30% to-[#2A1F58] to-90% text-white text-lg font-bold px-8 py-2 rounded-xl hover:bg-orange-600">S'inscrire</button>
            </div>

        </form>

    </div>

</div>


<?php include_once("./partials/footer.php") ?>