/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./src/**/*.{html,js}'],
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