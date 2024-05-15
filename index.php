<?php
require_once './frontend/components/layout.php';
require_once './backend/db/db.config.php';
?>

<script src="./backend/models/spotifyETL.js"></script>
<html lang="de" id="webPage" data-theme="fallback">

<body>
    <main class="bg-background text-text px-[5%] font-bold pt-[5%]">
        <div id="main-box" class="flex flex-col gap-5 mb-5 aspect-[3/2] w-full">
            <div id="top-box" class="flex flex-row gap-5 w-full">
                <div id="status-box" class="grid grid-rows-2 grid-cols-2 aspect-[1/1] text-moButton gap-2 w-full">
                    <div id="weather-desc-box" class="flex justify-center items-center col-span-2 shadow-main rounded-lg bg-middle uppercase"></div>
                    <div id="weather-icon-box" class="flex justify-center items-center bg-middle shadow-main rounded-lg">
                        <img src="" alt="Wätterlag" class="h-full w-auto">
                    </div>
                    <div id="flag-icon-box" class="flex justify-center items-center bg-middle shadow-main rounded-lg">Flag</div>
                </div>
                <div id="temp-box" class="flex justify-center items-center text-moTemp bg-dark shadow-main rounded-main rounded-lg w-full">Temp</div>
            </div>

            <div id="bottom-box" class="flex flex-row h-[10vh] w-full">
                <div id="play-button" class="flex justify-center items-center bg-text shadow-main text-moButton text-dark rounded-lg w-full" onclick="getPlaylist()">TUNE IN</div>

            </div>
        </div>
        <!-- Adjusted div for Spotify iframe -->
        <div id="spotify-container" class="flex justify-center mb-5 m-2 mx-auto w-full">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4VN7J0uq62foOhZndwOegy?utm_source=generator&theme=0" width="100%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>

        <div id="past-weather-box" class="flex flex-col gap-0 w-full">
            <div id="past-weather-text-box" class="flex justify-center items-center rounded-t-lg h-[10vh] text-moButton shadow-main bg-middle">WETTERRÜCKLICK</div>
            <div id="past-weather-icon-box" class="flex justify-start mb-5 items-center rounded-b-lg h-[10vh] shadow-main bg-dark">
                <img src="frontend/public/img/standard_icons/timeline.svg" alt="Past Weather Icon" class="h-auto w-[95%]">
            </div>
        </div>
    </main>
    <?php require_once './frontend/components/footer.html'; ?>
</body>

<script src="./backend/models/weatherETL.js"></script>

</html>