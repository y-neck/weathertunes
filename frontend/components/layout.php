<head>
    <!--Default character set: https://www.w3schools.com/html/html_charset.asp-->
    <meta charset="utf-8">
    <!--Tab title-->
    <title>Weathertunes</title>
    <!--Description of web page-->
    <meta name="description" content="">
    <!--define keywords for search engines-->
    <meta name="keywords" content="weather, tunes, music, spotify, api">
    <!--Responsive web design:https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--TODO: Tab image-->
    <link rel="icon" href="">

    <!-- Tailwind Config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- LottieFiles CDN -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script>
        tailwind.config = {
            theme: {
                colors: {
                    text: 'rgb(var(--color-text) / <alpha-value>)',
                    background: 'rgb(var(--color-background) / <alpha-value>)',
                    middle: 'rgb(var(--color-middle) / <alpha-value>)',
                    dark: 'rgb(var(--color-dark) / <alpha-value>)',
                    text2: 'rgb(var(--color-text2) / <alpha-value>)',
                },
                fontFamily: {
                    sans: ['Roboto Flex', 'sans-serif'],
                },
                fontSize: {
                    sm: '0.8rem',
                    base: '1rem',
                    xl: '2rem',
                    'moButton': '2.2rem',
                    '3xl': '1.953rem',
                    '4xl': '2.441rem',
                    'moTemp': '5rem',
                },
                extend: {
                    boxShadow: {
                        'main': '0 2px 15px -2px rgba(0, 0, 0, 0.2)',
                    }
                }
            }
        }
    </script>
    <!-- Font files -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./frontend/public/styles/themes.css">
</head>

<style>
    /* Global font styling */
    * {
        font-family: 'Roboto Flex', sans-serif;
        font-variation-settings:
            "slnt" 0,
            /* slant */
            "wdth" 25,
            /* width */
            "wght" 250,
            /* weight */
            "GRAD" 100,
            /* grad */
            "opsz" 68,
            /* opticalSize */
            "XOPQ" 96,
            /* x-height */
            "YOPQ" 79,
            /* y-height */
            "XTRA" 468,
            /* x-advance */
            "YTUC" 712,
            /* y-advance */
            "YTLC" 514,
            /* y-lead */
            "YTDE" -203,
            /* y-trail */
            "YTFI" 738;
        /* y-extend */
        letter-spacing: -1;
    }
</style>