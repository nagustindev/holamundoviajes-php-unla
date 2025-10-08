/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.php"],
  theme: {
    extend: {
        fontFamily: {
        fredoka: ['Fredoka', 'sans-serif'],
        racing: ['"Racing Sans One"', 'cursive'],
      },
      colors: {
        primary: "rgb(var(--color-primary) / <alpha-value>)",
        accent: "rgb(var(--color-accent) / <alpha-value>)",
      },
    },
  },
  plugins: [],
}

