let express = require('express')

let app = express()

// je lui précise qu'elle fichier sert à distribué les fichiers static
// en ajoutant assets je lui précise le préfixe en premier paramètre 
app.use('/assets', express.static('public'))


// define engine moteur
app.set('view engine', 'pug')

app.get('/', (req, res) => {
    res.render('pages/index', { title: 'Hey', message: 'Hello there!' })
})

app.listen(8080)