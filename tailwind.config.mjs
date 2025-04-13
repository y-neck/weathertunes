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