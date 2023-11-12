/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: "#D8973C",
          dark: "#BD632F"
        },
        secondary: {
          DEFAULT: "#A4243B"
        },
        background: {
          DEFAULT: "#D8C99B",
          dark: "#273E47"
        },

      },
      fontFamily: {
        'playFair': ['"Playfair Display"', 'serif'],
      }
    },
  },
  plugins: [],
}
