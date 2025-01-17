import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                Poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
                DmSerif: ["DM Serif Text", ...defaultTheme.fontFamily.sans],
                Alegrya: ["Alegrya Sans", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                merah: "#e00001",
            },
        },
    },

    plugins: [forms, typography, require("tailwind-gradient-mask-image")],
    darkMode: "class",
};
