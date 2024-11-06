/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ], 
  theme: {
    extend: {
      colors: {
        pink: {
          primary: '#DA0C81',
          secondary: '#FECEDA'
        },
        blue: {
          primary: '#161347'
        },
      },
      height: {
        450: '450px'
      },
    },
  },
  plugins: [],
}

