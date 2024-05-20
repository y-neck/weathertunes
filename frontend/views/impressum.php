<?php
require_once './frontend/components/layout.php';
require_once './backend/db/db.config.php';
?>

<html lang="de" id="webPage" data-theme="fallback">

<body class="bg-bg">
    <div class="w-full bg-white shadow-md p-6">
        <div class="container mx-auto flex justify-center">
            <img src="frontend\public\img\groupphoto\PH-gruppenfoto.jpg" alt="Group Picture" class="rounded-lg shadow-lg w-full max-w-4xl">
        </div>
    </div>
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <p class="text-gray-700 mb-4">
            Entwickelt und gestaltet wurde Weathertunes von Cla Töny, Joél Schaller und Yannick Spriessler im Rahmen ihres Bachelorstudiums 
            in Multimedia Productions an der FHGR und BFH. Mehr Informationen findest du hier.
        </p>
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Master Frontend</h2>
            <p class="text-gray-700 mb-6">Cla Töny</p>

            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Head of Design</h2>
            <p class="text-gray-700 mb-6">Joél Schaller</p>

            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Backend Magician</h2>
            <p class="text-gray-700">Yannick Spriessler</p>
        </div>
    </div>

</body>