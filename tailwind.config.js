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
          primary: '#DA0C81',
          secondary: '#FECEDA'
        },
        blue: {
          primary: '#161347'
        },
      },
    },
  },
  plugins: [],
}

