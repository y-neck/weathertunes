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
                    'sonnig1': '#D9830B',
                    'sonnig2': '#BF7000',
                    'sonnig3': '#FFB54D',

                    'wolkig1': '#637A99',
                    'wolkig2': '#4B5B73',
                    'wolkig3': '#A3B4CC',

                    'nebel1': '#555859',
                    'nebel2': '#3D3F40',
                    'nebel3': '#AAB1B2',

                    'niesel1': '#4C5955',
                    'niesel2': '#36403D',
                    'niesel3': '#ACBFB9',

                    'regen1': '#2E3D4D',
                    'regen2': '#293540',
                    'regen3': '#596C80',

                    'schnee1': '#B8C8D9',
                    'schnee2': '#99ACBF',
                    'schnee3': '#DAE0E5',

                    'sturm1': '#3D364D',
                    'sturm2': '#251F33',
                    'sturm3': '#110F1A',

                    'allgemein1': '#F2F2F2',
                    'allgemein2': '#1A1A1A',


                },
                fontFamily: {
                    sans: ['Roboto Flex', 'sans-serif'],
                },
                extend: {
                    boxShadow: {
                        '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
                    }
                }
            }
        }
    </script>
    <!-- Font files -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
</head>