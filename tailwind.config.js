import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Gunakan 'class' untuk kontrol manual dark mode
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans], // Tambahkan font custom Figtree
            },
            colors: {
                // Tambahkan warna tambahan jika diperlukan
                primary: {
                    light: '#6d28d9',
                    DEFAULT: '#5b21b6',
                    dark: '#4c1d95',
                },
            },
        },
    },
    plugins: [forms],
};
