<?php
require_once '../components/layout.php';
?>

<html lang="de" id="webPage" data-theme="fireplace">

<body class="bg-background h-full w-screen min-h-screen overflow-auto">
    <main class="flex flex-col text-text px-[5%] font-bold pt-[5%] w-screen mx-auto">
        <div id="Screen-anpassen-box" class="flex flex-col md:flex-row md:h-[38%] md:gap-[6.5%] md:mb-[5%] w-full box-border">
            <div id="main-box" class="flex flex-col gap-5 aspect-[3/2] mb-5 md:mb-0  w-full">
                <div id="top-box" class="flex flex-row gap-5 w-full">
                    <div id="status-box" class="grid grid-rows-2 grid-cols-2 aspect-[1/1] text-moButton gap-2 w-full">
                        <div id="weather-desc-box" class="flex justify-center items-center col-span-2 shadow-main rounded-lg bg-middle uppercase">Egal</div>
                        <div id="weather-icon-box" class="flex justify-center items-center bg-middle shadow-main rounded-lg">
                            <img src="../public/img/standard_icons/Fireplace_neg_Cookie.png" alt="Güetzi" class="h-full w-auto p-[10px] aspect-[1/1]">
                        </div>
                        <div id="flag-icon-box" class="flex justify-center items-center bg-middle shadow-main rounded-lg">
                            <img src="../public/img/standard_icons/Fireplace_neg_Mug.png" alt="Kaffi" class="h-full w-auto p-[10px] aspect-[1/1]">
                        </div>
                    </div>
                    <div id="temp-box" class="flex justify-center items-center text-moTemp bg-dark shadow-main rounded-main rounded-lg w-full">26°C</div>
                </div>
            </div>

            <!-- Adjusted div for Spotify iframe -->
            <div id="spotify-container" class="flex flex-col justify-center text-center items-center col-span-2 mb-5 md:mt-0 p-2 shadow-main rounded-lg bg-middle md:h-[100%] h-full uppercase w-full overflow-scroll">
                <div id="spotify-iframe" class="w-full h-full overflow-hidden">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/53o8593ZfL1u8C4WQyXoD5?utm_source=generator" width="100%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div id="responsive-box-unten" class="md:flex gap-[5%] w-full">
            <div id="footer-box" class="flex flex-col gap-5 w-full md:h-[20vh] md:ml-4">
                <div id="bottom-text-box" class="flex justify-center items-center text-center shadow-main rounded-lg h-full bg-middle uppercase max-sm:hidden w-full">
                    Made For You with ♥<br>
                    BY Cla, Joél and Yannick
                </div>
                <?php require_once '../components/footer.html'; ?>
            </div>
        </div>
    </main>
</body>

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