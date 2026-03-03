import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js', // Tambahkan ini
    ],
    darkMode: 'class', // Tambahkan ini
    theme: {
        extend: {
            fontFamily: {
                // Tambahkan font Bricolage Grotesque di sini
                sans: ['Bricolage Grotesque', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [forms],
};
