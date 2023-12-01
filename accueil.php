<?php

$title = "Page d'accueil";
include('./partials/header.php');

?>


<h1 class="text-center mt-10 font-bold text-3xl font-sansMontserrat">Bonjour</h1>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- page créer par jérémie Seynhaeve / Front-admin -->
    <h2 class="mt-4 container mx-auto text-4xl">Gestion des articles</h2>
    <div class="container mx-auto mt-10">
        <div class="flex items-center justify-between bg-gray-100 p-4 rounded border-b border-black">
            <!-- Image -->
            <div class="w-1/4">
                <img src="https://source.unsplash.com/random/150x100" alt="Miniature Article" class="w-full h-auto">
            </div>

            <!-- Date, Titre, Description -->
            <div class="w-1/2 px-4">
                <div class="text-gray-600 mt-0">28/06/23</div>
                <div class="text-2xl font-bold my-4">Les mycoses à cause de la danse</div>
                <div class="text-gray-500">Voici une illustration qui met l'accent sur la prévention et l'hygiène pour éviter les infections fongiques liées à la danse. Elle montre des chaussures de danse et des chaussettes placées à côté de sprays et de crèmes antifongiques, dans un studio de danse, soulignant l'importance des soins des pieds chez les danseurs. Cette image vise à promouvoir la sensibilisation et les pratiques saines dans le milieu de la danse.
                </div>
            </div>
            <!-- CRUD Buttons -->
            <div class="w-1/4 flex justify-end">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Lire</button>
                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Mettre à jour</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Supprimer</button>
            </div>
        </div>
        <!-- Commentaires -->
        <div class="mt-4 bg-gray-100 p-4 rounded border border-black">
            <h3 class="text-2xl font-bold">Commentaires</h3>
            <ul class="mt-4">
                <li class="mb-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-gray-600">28/06/23</div>
                            <div class="text-lg font-bold">pied_puant</div>
                            <div class="text-gray-500">j'ai souffert pendant de nombreuses années de pieds puants, grâce aux produits "respirepluschaussures", je peux enfin retirer mes chaussures sans avoir honte.</div>
                            <div class="mt-2">
                                Note : 4/5
                            </div>
                        </div>
                        <div>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Éditer</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</body>

</html>