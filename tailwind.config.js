/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ], 
  theme: {
    extend: {
      colors: {
        pink: {
          1000: '#DA0C81',
          1100: '#FECEDA'
        },
      },
    },
  },
  plugins: [],
}

