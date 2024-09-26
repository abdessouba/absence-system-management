/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
     "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/tw-elements/js/**/*.js"
  ],
  theme: {
    extend: {},
  },
  darkMode: "class",
  safelist: ['animate-[fade-in_1s_ease-in-out]', 'animate-[fade-in-down_1s_ease-in-out]', 'fadeInDown'],
  plugins: [require("tw-elements/plugin.cjs")]
}

