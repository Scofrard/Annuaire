<?php

$title = "Accueil";
include('./partials/header.php');

?>

<div class="bg-white mt-12 mb-12 pt-10 pb-10 pl-5 pr-5 rounded-xl shadow-2xl sm:mx-auto sm:w-full  md:max-w-xl xl:max-w-2xl">

    <div class="flex justify-between items-center p-5">
        <img style="width:110px; margin-bottom:20px;" src="./assets/logoannuaire.png">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Déconnexion</button>
    </div>

    <h1 class="text-center font-bold text-3xl">Bonjour Prénom</h1>

    <div class="mt-5 ml-5">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <div class="bg-white p5 shadow rounded mb-5 mt-5">
            <h3 class="font-bold text-lg">Prénom Nom</h3>
            <p>Téléphone : </p>
            <p>E-mail : </p>
            <p>Adresse : </p>
            <div class="flex justify-end mt-4">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 mr-2 rounded">
                    <img src="path/to/edit-icon.png" alt="Edit">
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                    <img src="path/to/delete-icon.png" alt="Delete">
                </button>
            </div>
        </div>
    </div>

</div>


<?php include_once("./partials/footer.php") ?>