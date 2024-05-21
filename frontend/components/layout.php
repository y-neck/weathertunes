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
    <link rel="author" href="humans.txt">

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

    <link rel="stylesheet" href="./frontend/public/styles/themes.css">
</head>

<style>
    /* Load Font */
    @font-face {
        font-family: 'Roboto Flex';
        src: url('./frontend/public/fonts/RobotoFlex-VariableFont.ttf') format('truetype');
    }

    /* Font styling Moblile */
    /* Temperature */
    #temp-box {
        font-family: 'Roboto Flex', sans-serif;
        font-variation-settings:
            "slnt" 0,
            /* Slant */
            "wdth" 25,
            /* Width */
            "wght" 250,
            /* Weight */
            "GRAD" 100,
            /* Grad */
            "XOPQ" 96,
            /* Parametric Thick Stroke */
            "XTRA" 468,
            /* Parametric Counter Width */
            "YOPQ" 79,
            /* Parametric Thin Stroke */
            "YTAS" 750,
            /* Parametric Ascender Height */
            "YTDE" -203,
            /* Parametric Descender Depth */
            "YTFI" 738,
            /* Parametric Figure Height */
            "YTLC" 514,
            /* Parametric Lowercase Height */
            "YTUC" 712,
            /* Parametric Uppercase Height  */
            "opsz" 68;
        /* Optical Size */
    }

    /* Button */
    button {
        font-family: 'Roboto Flex', sans-serif;
        font-variation-settings:
            "slnt" 0,
            /* Slant */
            "wdth" 50,
            /* Width */
            "wght" 400,
            /* Weight */
            "GRAD" 100,
            /* Grad */
            "XOPQ" 96,
            /* Parametric Thick Stroke */
            "XTRA" 468,
            /* Parametric Counter Width */
            "YOPQ" 79,
            /* Parametric Thin Stroke */
            "YTAS" 750,
            /* Parametric Ascender Height */
            "YTDE" -203,
            /* Parametric Descender Depth */
            "YTFI" 738,
            /* Parametric Figure Height */
            "YTLC" 514,
            /* Parametric Lowercase Height */
            "YTUC" 712,
            /* Parametric Uppercase Height  */
            "opsz" 44;
        /* Optical Size */
    }

    /* Footer */
    footer a {
        font-family: 'Roboto Flex', sans-serif;
        font-variation-settings:
            "slnt" 0,
            /* Slant */
            "wdth" 50,
            /* Width */
            "wght" 400,
            /* Weight */
            "GRAD" 100,
            /* Grad */
            "XOPQ" 96,
            /* Parametric Thick Stroke */
            "XTRA" 468,
            /* Parametric Counter Width */
            "YOPQ" 79,
            /* Parametric Thin Stroke */
            "YTAS" 750,
            /* Parametric Ascender Height */
            "YTDE" -203,
            /* Parametric Descender Depth */
            "YTFI" 738,
            /* Parametric Figure Height */
            "YTLC" 514,
            /* Parametric Lowercase Height */
            "YTUC" 712,
            /* Parametric Uppercase Height  */
            "opsz" 12;
        /* Optical Size */
    }

    /* Header 1 */
    h1 {
        font-family: 'Roboto Flex', sans-serif;
        font-variation-settings:
            "slnt" 0,
            /* Slant */
            "wdth" 50,
            /* Width */
            "wght" 550,
            /* Weight */
            "GRAD" 50,
            /* Grad */
            "XOPQ" 96,
            /* Parametric Thick Stroke */
            "XTRA" 468,
            /* Parametric Counter Width */
            "YOPQ" 79,
            /* Parametric Thin Stroke */
            "YTAS" 750,
            /* Parametric Ascender Height */
            "YTDE" -203,
            /* Parametric Descender Depth */
            "YTFI" 738,
            /* Parametric Figure Height */
            "YTLC" 514,
            /* Parametric Lowercase Height */
            "YTUC" 712,
            /* Parametric Uppercase Height  */
            "opsz" 44;
        /* Optical Size */
    }

    /* Copy Text */
    *,
    p {
        font-family: 'Roboto Flex', sans-serif;
        font-variation-settings:
            "slnt" 0,
            /* Slant */
            "wdth" 50,
            /* Width */
            "wght" 400,
            /* Weight */
            "GRAD" 0,
            /* Grad */
            "XOPQ" 96,
            /* Parametric Thick Stroke */
            "XTRA" 468,
            /* Parametric Counter Width */
            "YOPQ" 79,
            /* Parametric Thin Stroke */
            "YTAS" 750,
            /* Parametric Ascender Height */
            "YTDE" -203,
            /* Parametric Descender Depth */
            "YTFI" 738,
            /* Parametric Figure Height */
            "YTLC" 514,
            /* Parametric Lowercase Height */
            "YTUC" 712,
            /* Parametric Uppercase Height  */
            "opsz" 20;
        /* Optical Size */
    }

    /* Copy Text Links */
    a {
        font-family: 'Roboto Flex', sans-serif;
        text-decoration: underline;
        font-variation-settings:
            "slnt" 0,
            /* Slant */
            "wdth" 50,
            /* Width */
            "wght" 400,
            /* Weight */
            "GRAD" 0,
            /* Grad */
            "XOPQ" 96,
            /* Parametric Thick Stroke */
            "XTRA" 468,
            /* Parametric Counter Width */
            "YOPQ" 79,
            /* Parametric Thin Stroke */
            "YTAS" 750,
            /* Parametric Ascender Height */
            "YTDE" -203,
            /* Parametric Descender Depth */
            "YTFI" 738,
            /* Parametric Figure Height */
            "YTLC" 514,
            /* Parametric Lowercase Height */
            "YTUC" 712,
            /* Parametric Uppercase Height  */
            "opsz" 20;
        /* Optical Size */
    }

    /* Copy Text Bold */
    b {
        font-family: 'Roboto Flex', sans-serif;
        font-variation-settings:
            "slnt" 0,
            /* Slant */
            "wdth" 50,
            /* Width */
            "wght" 400,
            /* Weight */
            "GRAD" 150,
            /* Grad */
            "XOPQ" 96,
            /* Parametric Thick Stroke */
            "XTRA" 468,
            /* Parametric Counter Width */
            "YOPQ" 79,
            /* Parametric Thin Stroke */
            "YTAS" 750,
            /* Parametric Ascender Height */
            "YTDE" -203,
            /* Parametric Descender Depth */
            "YTFI" 738,
            /* Parametric Figure Height */
            "YTLC" 514,
            /* Parametric Lowercase Height */
            "YTUC" 712,
            /* Parametric Uppercase Height  */
            "opsz" 20;
        /* Optical Size */
    }
</style>