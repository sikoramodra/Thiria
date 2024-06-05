/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            
            fontFamily: {
                'times': ['"Times New Roman"', 'serif'],
              },

            colors: {
                headerColor: '#283618',
                firstColor: '#F0EAD2',
                secondColor: '#DDE5B6',
                thirdColor: '#ADC178',
                fourthColor: '#A98467',
                fifthColor: '#6C584C',
            },

            backgroundImage: {
                'forest': "url('/resources/image/bg-forest.jpg')",
            }
        },
    },
    plugins: [],
}
