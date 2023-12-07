<?php
$title = "Créer un contact";
include('./partials/header.php');
session_start();
?>


<div class="bg-white mt-12 mb-12 pt-10 pb-10 pl-5 pr-5 rounded-xl shadow-2xl sm:mx-auto sm:w-full  md:max-w-xl xl:max-w-2xl">

    <div class="flex content-center justify-center items-center">
        <img style="width:220px; margin-bottom:20px;" src="./assets/logoannuaire.png">
    </div>

    <h1 class="text-center font-bold text-3xl">Créer un contact</h1>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-lg xl:max-w-2xl">

        <div class="border border-[#533daf] rounded p-5 mb-4">
            <form action="admin/admin_importer_contacts.php" method="post" enctype="multipart/form-data">
                <div class="flex flex justify-between items-center">
                    <input type="file" name="csv_upload" id="csv_upload">
                    <button class="bg-gradient-to-b from-[#533daf] from-30% to-[#2A1F58] to-90% text-white text-lg font-bold px-8 py-2 rounded-xl hover:bg-orange-600" type="submit" name="bImporter">Importer</button>
                </div>
            </form>
        </div>

        <form action="admin/admin_ajout_contact.php" method="POST">

            <?php if (isset($_SESSION['error'])) : ?>
                <div class="bg-red-500 text-white text-center p-2 mb-6 rounded">
                    <?php echo $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <div class="grid gap-2 md:grid-cols-2">
                <div class="mr-4 ml-4">
                    <label class="block text-gray-600 font-light text-sm mb-1" for="nom">Nom</label>
                    <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="text" id="nom" name="nom" placeholder="Nom" autofocus>
                </div>

                <div class="mr-4 ml-4">
                    <label class="block text-gray-600 font-light text-sm mb-1" for="prenom">Prénom</label>
                    <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="text" id="prenom" name="prenom" placeholder="Prénom">
                </div>
            </div>

            <div class="grid gap-2 md:grid-cols-2">
                <div class=" ml-4 mr-4 mt-6">
                    <label class="block text-gray-600 font-light text-sm mb-1" for="email">E-mail</label>
                    <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="mail" id="email" name="email" placeholder="E-mail">
                </div>

                <div class="mr-4 ml-4 mt-6 mb-6">
                    <label class="block text-gray-600 font-light text-sm mb-1" for="telephone">Téléphone</label>
                    <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="tel" id="telephone" name="telephone" placeholder="Téléphone">
                </div>
            </div>

            <div class="mr-4 ml-4">
                <label class="block text-gray-600 font-light text-sm mb-1" for="adresse">Adresse</label>
                <input class="shadow-lg border border-[#533daf] py-2 px-2 w-full rounded-md focus:shadow-lg" type="text" id="adresse" name="adresse" placeholder="Adresse">
            </div>

            <div class="m-4 mt-10 text-center">
                <button type="submit" name="bCreer" class="bg-gradient-to-b from-[#533daf] from-30% to-[#2A1F58] to-90% text-white font-bold px-8 py-2 rounded-xl">Créer</button>
            </div>

        </form>

    </div>

</div>


<?php include_once("./partials/footer.php") ?>