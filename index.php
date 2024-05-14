<?php
require_once './frontend/components/layout.php';
require_once './backend/db/db.config.php';
?>

<html lang="de" data-theme="klar">

<body class="bg-background text-text">
    <main class="px-[6%] font-bold pt-[2%]">
        <div id="main-box" class="flex flex-col gap-6 aspect-[3/2] w-full">
            <div id="top-box" class="flex flex-row gap-4 w-full">
                <div id="status-box" class="grid grid-rows-2 grid-cols-2 aspect-[1/1] text-2xl gap-2 w-full">
                    <div id="weather-desc-box" class="flex justify-center items-center col-span-2 shadow-main rounded-lg bg-gray-200">dini Mum</div>
                    <div id="weather-icon-box" class="flex justify-center items-center bg-gray-300 shadow-main rounded-lg">Icon</div>
                    <div id="flag-icon-box" class="flex justify-center items-center bg-gray-300 shadow-main rounded-lg">Flag</div>
                </div>
                <div id="temp-box" class="flex justify-center items-center text-5xl bg-gray-300 shadow-main rounded-main rounded-lg w-full">temp</div>
            </div>

            <div id="bottom-box" class="flex flex-row h-[10vh] w-full">
                <div id="play-button" class="flex justify-center items-center bg-gray-300 shadow-main rounded-lg w-full">click play</div>

            </div>
        </div>
        <!-- Adjusted div for Spotify iframe -->
        <div id="spotify-container" class="flex justify-center m-2 mx-auto w-full">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4VN7J0uq62foOhZndwOegy?utm_source=generator&theme=0" width="100%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>

        <div id="past-weather-box" class="flex flex-col gap-0 w-full mb-2">
            <div id="past-weather-text-box" class="rounded-t-lg h-[10vh] bg-gray-200">Wetterbeschreibung</div>
            <div id="past-weather-icon-box" class="rounded-b-lg h-[10vh] bg-gray-300">Icon Wetter</div>
        </div>
    </main>
    <?php require_once './frontend/components/footer.html'; ?>
</body>
<script src="./backend/models/weatherETL.js"></script>


</html>