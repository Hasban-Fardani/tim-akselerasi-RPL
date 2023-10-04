/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,php}",
    "./components/*.{html,php}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("daisyui")
  ],
}

