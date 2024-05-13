<html lang="de" data-theme="sonnig">
<?php
require_once './frontend/components/layout.php';
require_once './backend/db/db.config.php';
?>

<body class="bg-background text-text">
    <main class="px-[6%] font-bold pt-[2%]">
        <div id="main-box" class="flex flex-col gap-3 aspect-[3/2] w-full">
            <div id="top-box" class="flex flex-row gap-3 w-full">
                <div id="status-box" class="grid grid-rows-2 grid-cols-2 aspect-[1/1] gap-1 w-full">
                    <div id="weather-desc-box" class="col-span-2 rounded-lg bg-gray-200">Wetterbeschreibung</div>
                    <div id="weather-icon-box" class="bg-gray-300 rounded-lg">
                        <img src="../frontend/public/images/Icons.svg" alt="">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="1000" height="1000" viewBox="0 0 1000 1000">
                            <defs>
                            <style>
                            .cls-1 {
                                fill: none;
                                stroke: #fff;
                                stroke-linecap: round;
                                stroke-miterlimit: 10;
                                stroke-width: 50px;
                            }

                            .cls-2 {
                                fill: #fff;
                                stroke-width: 0px;
                            }
                            </style>
                            </defs>
                            <line class="cls-1" x1="685.57" y1="500" x2="813.32" y2="500"/>
                            <line class="cls-1" x1="190.68" y1="500" x2="318.43" y2="500"/>
                            <line class="cls-1" x1="502" y1="316.43" x2="502" y2="188.68"/>
                            <line class="cls-1" x1="502" y1="811.32" x2="502" y2="683.57"/>
                            <line class="cls-1" x1="631.8" y1="370.2" x2="722.13" y2="279.87"/>
                            <line class="cls-1" x1="281.87" y1="720.13" x2="372.2" y2="629.8"/>
                            <line class="cls-1" x1="372.2" y1="370.2" x2="281.87" y2="279.87"/>
                            <path class="cls-2" d="M502,420.2c44,0,79.8,35.8,79.8,79.8s-35.8,79.8-79.8,79.8-79.8-35.8-79.8-79.8,35.8-79.8,79.8-79.8M502,370.2c-71.69,0-129.8,58.12-129.8,129.8s58.12,129.8,129.8,129.8,129.8-58.12,129.8-129.8-58.12-129.8-129.8-129.8h0Z"/>
                            <line class="cls-1" x1="722.13" y1="720.13" x2="631.8" y2="629.8"/>
                        </svg>
                    </div>
                    <div id="flag-icon-box" class="bg-gray-300 rounded-lg">Flag</div>
                </div>
                <div id="temp-box" class="bg-gray-300 rounded-lg w-full">temp</div>
            </div>

            <div id="bottom-box" class="flex flex-row h-[10vh] w-full">
                <div id="play-button" class="bg-gray-300 shadow-lg rounded-lg w-full">click play</div>

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

</html>