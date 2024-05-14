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
    <!--     <script src="../styles/tailwind.config.mjs"></script> -->
    <script>
        tailwind.config = {
            theme: {
                colors: {
                    text: 'rgb(var(--color-text) / <alpha-value>)',
                    background: 'rgb(var(--color-background) / <alpha-value>)',
                    middle: 'rgb(var(--color-middle) / <alpha-value>)',
                    dark: 'rgb(var(--color-dark) / <alpha-value>)',
                },
                fontFamily: {
                    sans: ['Roboto Flex', 'sans-serif'],
                },
                fontSize: {
                    sm: '0.8rem',
                    base: '1rem',
                    xl: '1.25rem',
                    '2xl': '1.563rem',
                    '3xl': '1.953rem',
                    '4xl': '2.441rem',
                    '5xl': '3.8rem',
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