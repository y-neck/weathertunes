<?php
require_once '../components/layout.php';
?>

<html lang="de" id="webPage" data-theme="fallback">

<body class="bg-background">
    <main class="w-full bg-bg px-4 flex flex-col">
        <div>
            <div class="container mx-auto text-left">
                <h1 class="text-4xl font-bold text-text">Impressum</h1>
            </div>
            <div class="container mx-auto flex justify-center">
                <img src="..\public\img\groupphoto\PH-gruppenfoto.jpg" alt="Group Picture" class="rounded-lg shadow-lg w-full max-w-4xl">
            </div>

            <div class="container mx-auto mt-0 p-4 bg-background flex flex-col text-left">
                <p class="text-text">
                    Entwickelt und gestaltet wurde Weathertunes von Cla Töny, Joél Schaller und Yannick Spriessler im Rahmen ihres Bachelorstudiums
                    in Multimedia Productions an der FHGR und BFH. Mehr Informationen findest du <a href="/humans.txt" class="underline">hier</a>.
                </p>
            </div>
        </div>
        <div class="mt-8 leading-none mb-4">
            <h2 class="text-2xl font-semibold text-text mb-2">Master of Frontend</h2>
            <p class="text-text mb-6">Cla Töny</p>

            <h2 class="text-2xl font-semibold text-text mb-2">Head of Design</h2>
            <p class="text-text mb-6">Joél Schaller</p>

            <h2 class="text-2xl font-semibold text-text mb-2">Backend Magician</h2>
            <p class="text-text">Yannick Spriessler</p>
        </div>
        </div>
    </main>
</body>
<?php require_once '../components/footer.html'; ?>

<script src="backend/models/weatherETL.js"></script>
<script type="module" src="backend/models/spotifyETL.js"></script>

</html>