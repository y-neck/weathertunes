<?php
require_once 'frontend/components/layout.php';
require_once 'backend/db/db.config.php';
?>

<html lang="de" id="webPage" data-theme="fallback">

<body>
    <main class="bg-background text-text px-[5%] font-bold pt-[5%]">
        <div id="Screen-anpassen-box">
        <div id="main-box" class="flex flex-col gap-5 mb-5 aspect-[3/2] w-full">
            <div id="top-box" class="flex flex-row gap-5 w-full">
                <div id="status-box" class="grid grid-rows-2 grid-cols-2 aspect-[1/1] text-moButton gap-2 w-full">
                    <div id="weather-desc-box" class="flex justify-center items-center col-span-2 shadow-main rounded-lg bg-middle uppercase"></div>
                    <div id="weather-icon-box" class="flex justify-center items-center bg-middle shadow-main rounded-lg">
                        <img src="" alt="Wätterlag" class="h-full w-auto">
                    </div>
                    <div id="flag-icon-box" class="flex justify-center items-center bg-middle shadow-main rounded-lg">
                        <lottie-player background="transparent" speed="1" style="height: 100%; width: 100%;" loop autoplay></lottie-player>
                    </div>
                </div>
                <div id="temp-box" class="flex justify-center items-center text-moTemp bg-dark shadow-main rounded-main rounded-lg w-full">Temp</div>
            </div>

            <div id="bottom-box" class="flex flex-row h-[10vh] w-full">
                <button id="play-button" class="flex justify-center items-center bg-text shadow-main text-moButton text-dark hover:bg-dark hover:text-text transition duration-200 ease-in-out rounded-lg w-full">TUNE IN</button>

            </div>
        </div>

        <!-- Adjusted div for Spotify iframe -->
        <div id="spotify-container" class="flex flex-col justify-center text-center items-center col-span-2 mb-5 shadow-main rounded-lg bg-middle h-[500px] uppercase=">
            <p id="spotify-text" class="m-[20%]">Öffne Spotify und klicke auf “Tune In”, um dir deinen Wettermix generieren zu lassen. <br><br> Falls die Wiedergabe nicht automatisch startet, musst du eventuell zuerst selbst einen Song abspielen, damit Spotify dein Gerät erkennt.</p>

            <div id="spotify-iframe"></div>
            <div class="flex h-auto w-[90%] justify-center items-center">
                <div style="padding: 0" class="container text-left">
                    <h1 class="text-4xl font-bold text-text">WETTERMIX</h1>
                </div>
                <div id="recommendations-player-controls" class="flex h-[30px] w-[30px] items-center bg-white bg-text2 rounded-full">
                    <button id="recommendations-player-pause">
                        <img src="frontend/public/img/standard_icons/Play.svg" alt="Play Icon" class="h-[25px] w-auto">
                    </button>
                </div>
            </div>
            <div id="recommendations-player" class="overflow-y-auto w-[90%]">
                <!-- List for Songs, scrollable -->
                <ol id="recommendations-player-list" class="h-[calc(100vh - 10vh)]">
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                    <li class="track-list-item text-left pl-[10px]">bakjbgag</li>
                </ol>

            </div>
        </div>

</div>

        <div id="past-weather-box" class="flex flex-col gap-0 w-full">
            <div id="past-weather-text-box" class="flex justify-center items-center rounded-t-lg h-[10vh] text-moButton shadow-main bg-middle">WETTERRÜCKBLICK</div>
            <div id="past-weather-icon-box" class="relative flex justify-start mb-5 items-center rounded-b-lg h-[10vh] shadow-main bg-dark">
                <img src="frontend/public/img/standard_icons/timeline.svg" alt="Past Weather Icon" class="h-auto w-[96%]">
                <div class="placeholder-container absolute top-0 left-0 w-full h-full flex justify-center items-center gap-[10%] z-10">
                    <div id="past-weather-icon-1" class="placeholder-item bg-dark px-2 h-[60%] w-auto">
                        <img src="frontend/public/img/weather_icons/neg/Icons_Neg_Klar_Nacht.png" alt="Placeholder 1" class="h-full w-auto">
                    </div>
                    <div id="past-weather-icon-2" class="placeholder-item bg-dark px-2 h-[60%] w-auto">
                        <img src="frontend/public/img/weather_icons/neg/Icons_Neg_Klar_Nacht.png" alt="Placeholder 2" class="h-full w-auto">
                    </div>
                    <div id="past-weather-icon-3" class="placeholder-item bg-dark px-2 h-[60%] w-auto">
                        <img src="frontend/public/img/weather_icons/neg/Icons_Neg_Klar_Nacht.png" alt="Placeholder 3" class="h-full w-auto">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'frontend/components/footer.html'; ?>
</body>

<script src="backend/models/weatherETL.js"></script>
<script type="module" src="backend/models/spotifyETL.js"></script>

</html>


<style>
    .track-list-item {
        list-style-type: decimal;
        text-transform: uppercase;
        border-bottom: 1px solid #ccc;
    }
    ol {
        list-style-position: inside;
        padding-inline-start: 0;
    }
    li:not(:last-child) {
        margin-bottom: 0.5em;
    }
</style>

