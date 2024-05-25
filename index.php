<?php
require_once 'frontend/components/layout.php';
require_once 'backend/db/db.config.php';
?>

<html lang="de" id="webPage" data-theme="fallback">

<body class="bg-background h-full w-screen min-h-screen overflow-auto">
    <main class="flex flex-col text-text px-[5%] font-bold pt-[5%] w-screen mx-auto">
        <div id="Screen-anpassen-box" class="flex flex-col md:flex-row md:h-[38%] md:gap-[6.5%] md:mb-[5%] w-full box-border">
            <div id="main-box" class="flex flex-col gap-5 aspect-[3/2] mb-5 md:mb-0  w-full">
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
                <div id="bottom-box" class="flex flex-row w-full">
                    <button id="play-button" class="flex justify-center bg-text shadow-main text-moButton text-dark hover:bg-dark hover:text-text transition duration-200 ease-in-out rounded-lg w-full h-full">TUNE IN</button>
                </div>
            </div>

            <!-- Adjusted div for Spotify iframe -->
            <div id="spotify-container" class="flex flex-col justify-center text-center items-center col-span-2 mb-5 md:mt-0 p-2 shadow-main rounded-lg bg-middle md:h-[100%] h-full uppercase w-full overflow-scroll">
                <p id="spotify-text" class="m-[20%]">Öffne Spotify und klicke auf “Tune In”, um dir deinen Wettermix generieren zu lassen. <br><br> Falls die Wiedergabe nicht automatisch startet, musst du eventuell zuerst selbst einen Song abspielen, damit Spotify dein Gerät erkennt.</p>
                <div id="spotify-iframe" class="w-full h-full overflow-hidden"></div>
                <div id="weathermix-player" class="flex flex-row h-full w-full justify-between items-center">
                    <div style="padding: 0" class="container text-left">
                        <h1 class="text-4xl font-bold text-text">WETTERMIX</h1>
                    </div>
                    <div id="recommendations-player-controls" class="flex items-center">
                        <button id="recommendations-player-pause">
                            <img src="frontend\public\img\standard_icons\Pause_neg.svg" alt="Play Icon" class="h-[40px] w-auto">
                        </button>
                    </div>
                </div>
                <div id="recommendations-player" class="overflow-y-auto w-[90%]">
                    <!-- List for Songs, scrollable -->
                    <ol id="recommendations-player-list" class="h-[calc(100vh - 10vh)] text-left items-left">

                    </ol>
                </div>
            </div>
        </div>
        <div id="responsive-box-unten" class="md:flex gap-[5%] w-full">
            <div id="past-weather-box" class="flex flex-col gap-0 w-full md:w-1/2">
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
            <div id="footer-box" class="flex flex-col gap-5 w-full md:h-[20vh] md:w-1/2 md:ml-4">
                <div id="bottom-text-box" class="flex justify-center items-center text-center shadow-main rounded-lg h-full bg-middle uppercase max-sm:hidden w-full">
                    Made For You with ♥<br>
                    BY Cla, Joél and Yannick
                </div>
                <?php require_once 'frontend/components/footer.html'; ?>
            </div>
        </div>
    </main>
</body>

<script src="backend/models/weatherETL.js"></script>
<script type="module" src="backend/models/spotifyETL.js"></script>

</html>


<style>
    @media (max-width: 768px) {
        #bottom-text-box {
            display: none;
        }
    }

    .track-list-item {
        list-style-type: decimal;
        text-transform: uppercase;
        border-bottom: 1px solid #ccc;
        text-align: left;
        padding-left: 10px;
    }

    ol {
        list-style-position: inside;
        padding-inline-start: 0;
    }

    li:not(:last-child) {
        margin-bottom: 0.5em;
    }
</style>