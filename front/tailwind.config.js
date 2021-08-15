const colors = require('tailwindcss/colors')

module.exports = {
  purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
    container: {
      center: true,
    },
    colors: {
      gray: colors.coolGray,
      blue: colors.sky,
      red: colors.rose,
      pink: colors.fuchsia,
      orange: colors.orange,
      yellow: colors.amber,
      green: colors.emerald,
      black: '#000',
      white: '#FFF',
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
