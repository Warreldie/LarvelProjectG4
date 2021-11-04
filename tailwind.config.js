module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        warningred: '#e96a6a',
        mainblue: '#BBD3D7',
        h1: '#444444',
        h3: '#6E797B',
        buttonHover: '#8AC8D3'
      },
      fontFamily:{
        headers: 'Yanone Kaffeesatz, sans-serif',
      },
      backgroundImage: theme => ({
        'home' : "url('/images/bg-home.png')",
      }) 
    },
  },
  variants: {
    extend: {},
    display: ['responsive', 'group-hover', 'group-focus'],
  },
  plugins: [],
}
