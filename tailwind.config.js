/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',    
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

