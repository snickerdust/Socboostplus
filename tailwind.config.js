import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#000000",
                "light-bg": "#FFFFFF",
                "section-bg": "#F8F9FB",
                "text-charcoal": "#1A1A1E",
                "text-muted": "#64748B",
                accent: {
                    pink: "#FE2C55",
                    cyan: "#25F4EE",
                    purple: "#A259FF"
                },
                sidebar: "#0F172A"
            },
        },
    },

    plugins: [forms],
};
