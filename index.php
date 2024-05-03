<?php
require_once './frontend/components/layout.php';
require_once './backend/db/db.config.php';
?>

<body>
<main>
    <div id="main-box" class="flex">
        <div id="top-box" class="flex-1">
            <div id="status-box" class="grid grid-rows-2 grid-cols-2 m-2 p-4 border border-gray-200 gap-2">
                    <div id="weather-desc-box" class="col-span-2 bg-gray-200 p-2">Content 1A - Top</div>
                    <div id="weather-icon-box" class="bg-gray-300 p-2">Content 1A - Bottom Left</div>
                    <div id="flag-icon-box" class="bg-gray-300 p-2">Content 1A - Bottom Right</div>
                </div>    
                <div id="temp-box" class="m-2 p-4 border border-gray-200">Content 1B</div>
            </div>
            
            <div id="bottom-box" class="flex-1">
                <div id="play-box" class="m-2 p-4 border border-gray-200">Content 2A</div>
                <div id="slider-box" class="m-2 p-4 border border-gray-200">Content 2B</div>
            </div>
    </div>
    <div id="spotify-container" class="m-2 p-4">
        <!-- Placeholder for the Spotify iframe -->
        <iframe id="spotify-iframe" src="https://open.spotify.com/embed/track/yourSpotifyTrackID" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
    </div>
</main>
<?php require_once './frontend/components/footer.php'; ?>
</body> 