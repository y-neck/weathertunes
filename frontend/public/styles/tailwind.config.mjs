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
        extend: {
            boxShadow: {
                '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
            }
        }
    }
}