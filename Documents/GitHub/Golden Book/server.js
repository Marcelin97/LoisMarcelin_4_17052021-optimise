// * Requires
let express = require("express");
let app = express();

// formate les données pour lire les requête type format
let bodyParser = require("body-parser");

// stock data of session
let session = require("express-session");

// * define engine moteur
app.set("view engine", "ejs");

// * Middlewares
// je lui précise qu'elle fichier sert à distribué les fichiers static
// en ajoutant assets je lui précise le préfixe en premier paramètre
app.use("/assets", express.static("public"));

// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }));

// parse application/json
app.use(bodyParser.json());

// si je regarde dans l'inspecteur/réseau et dans localhost/headers
// je peux voir Set-Cookie qui contiendra la clé
app.use(
  session({
    secret: "rzgegerger",
    resave: false,
    saveUninitialized: true,
    cookie: { secure: false },
  })
);

// middlewares flash
app.use(require("./middlewares/flash.js"));

// * Routes
app.get("/", (req, res) => {
  console.log(req.session);
  res.render("pages/index");
});

// requête depuis la page d'accueil
// https://expressjs.com/en/5x/api.html#req.body
app.post("/", (req, res) => {
  console.log(req.body);
  if (req.body.message === undefined || req.body.message === "") {
    // crée une méthode flash qui prends en 1er paramètre le type et le message
    req.flash("error", "Vous n'avez pas posté de message");
    // je mets ma redirect
    res.redirect("/");
  } else {
    // * Gestion MySQL pour sauvegarder dans le cas d'une information correct/d'un message
    // on crée une variable qui va contenir notre model
    let Message = require("./models/message.js");
    // Je crée une class message qui récupère le body de ma requete
    // comme c'est async, elle prend en seconde paramètre une fonction
    Message.create(req.body.message, function () {
      req.flash("success", "Bravo pour ce message");
      // je mets ma redirect
      res.redirect("/");
    });
  }
});

// * Port
app.listen(8080);
