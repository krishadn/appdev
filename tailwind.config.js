import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./node_modules/flowbite/**/*.js"

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'brand-green':'#89D036',
            'brand-green-darker':"#598024",
            'brand-purple':'#8952B0',
            'brand-purple-darker':'#5C3881',
            'brand-cream':'#FEEDDF',
        }
    },

    plugins: [forms,
              require('flowbite/plugin')],
        darkMode: "class"
};
