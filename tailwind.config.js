/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./components/**/*.{js,vue,ts}",
        "./layouts/**/*.vue",
        "./pages/**/*.vue",
        "./plugins/**/*.{js,ts}",
        "./app.vue",
        "./error.vue",
    ],
    fontFamily: {
        sans: ['Roboto Flex', 'sans-serif'],
    },
    theme: {
        extend: {
            colors: {
                text: 'var(--color-text)',
                background: 'var(--color-background)',
                middle: 'var(--color-middle)',
                dark: 'var(--color-dark)',
                text2: 'var(--color-text2)',
            },

            fontSize: {
                sm: '0.75rem',
                base: '1rem',
                xl: '2rem',
                'moButton': '2.2rem',
                '3xl': '1.953rem',
                '4xl': '2.441rem',
                'moTemp': '5rem',
            },
            boxShadow: {
                'main': '0 2px 15px -2px rgba(0, 0, 0, 0.2)',
            }
        }
    },
}

