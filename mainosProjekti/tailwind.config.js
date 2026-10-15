import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Source Sans 3"', ...defaultTheme.fontFamily.sans],
                display: ['Bitter', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                spruce: {
                    50:  '#EDF3F0',
                    100: '#D6E3DD',
                    700: '#2F5249',
                    800: '#23403A',
                    900: '#182B27',
                },
                ochre: {
                    600: '#A3412F',
                    700: '#8A3526',
                    800: '#6F2A1E',
                },
                snow:  '#F2F4F3',
                birch: '#D8D5CB',
            },
        },
    },

    plugins: [forms, typography],
};
