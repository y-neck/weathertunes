<?php
require_once './frontend/components/layout.php';
require_once './backend/db/db.config.php';
?>

<body>
<main>
    <div id="main-box" class="flex">
        <div id="top-box" class="flex-1">
                <div id="status-box" class="m-2 p-4 border border-gray-200">Content 1A</div>
                <div id="temp-box" class="m-2 p-4 border border-gray-200">Content 1B</div>
            </div>
            
            <div id="bottom-box" class="flex-1">
                <div id="play-box" class="m-2 p-4 border border-gray-200">Content 2A</div>
                <div id="slider-box" class="m-2 p-4 border border-gray-200">Content 2B</div>
            </div>
    </div>

</main>
<?php require_once './frontend/components/footer.php'; ?>
</body> 