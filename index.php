<?php
require_once './frontend/components/layout.php';
require_once './backend/db/db.config.php';
?>

<body>
<main class="p-[3%]">
    <div id="main-box" class="flex flex-col gap-1 w-full">
        <div id="top-box" class="flex flex-row h-[20vh] gap-1 w-full">
            <div id="status-box" class="grid grid-rows-2 grid-cols-2 border border-gray-200 gap-1 w-full">
                <div id="weather-desc-box" class="col-span-2 bg-gray-200">Sonnig</div>
                <div id="weather-icon-box" class="bg-gray-300">Icon Wetter</div>
                <div id="flag-icon-box" class="bg-gray-300">Flag</div>
            </div>    
            <div id="temp-box" class="border border-gray-200 w-full">temp</div>
        </div>
        
        <div id="bottom-box" class="flex flex-row h-[10vh] gap-1 w-full">
            <div id="play-box" class="border border-gray-200 w-full">click play</div>
            <div id="slider-box" class="border border-gray-200 w-full">I'll be bar</div>
        </div>
    </div>
    <!-- Adjusted div for Spotify iframe -->
    <div id="spotify-container" class="flex justify-center mx-auto w-full">
        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4VN7J0uq62foOhZndwOegy?utm_source=generator&theme=0" width="100%" height="400" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    </div>
</main>
<?php require_once './frontend/components/footer.html'; ?>
</body>
