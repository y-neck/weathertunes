/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./src/**/*.{html,js}'],
    theme: {
        colors: {
            'blue': '#1fb6ff',
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