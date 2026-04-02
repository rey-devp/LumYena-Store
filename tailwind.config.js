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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                nunito: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                lumyena: {
                    light: '#FFF0F5',   // Lavender Blush
                    card: '#FFFFFF',
                    border: '#FFB6C1',  // Light Pink
                    primary: '#FF69B4', // Hot Pink
                    hover: '#FF1493',   // Deep Pink
                    secondary: '#FFC0CB', // Pink
                    text: '#4A4A4A',
                    muted: '#888888',
                }
            }
        },
    },

    plugins: [forms],
};
