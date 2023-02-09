// * Requires
// use express (micro frame work) to start a application
let express = require("express");
let app = express();
let bodyParser = require("body-parser");

// stock data of session
let session = require("express-session");

// process.env.NODE_ENV="production"

// * define engine moteur
app.set("view engine", "ejs");

// * Middlewares
// I tell him that this file is used to distribute static files
// by adding assets I specify the prefix as the first parameter
app.use("/assets", express.static("public"));

// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }));

// parse application/json
app.use(bodyParser.json());

// if i look in inspector/network and in localhost/headers i can see Set-Cookie which will contain the key
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
// captures requests from the homepage
// https://expressjs.com/en/5x/api.html#req.body
app.post("/", (req, res) => {
  console.log(req.body);
  if (req.body.message === undefined || req.body.message === "") {
    // create a flash method which takes the type and the message as 1st parameter
    req.flash("error", "Vous n'avez pas posté de message");
    // redirect to homepage
    res.redirect("/");
  } else {
    // * Gestion MySQL pour sauvegarder dans le cas d'une information correct/d'un message
    // we create a variable that will contain our model
    let Message = require("./models/message.js");
    // I create a "message" class which retrieves the body of my request
    // as it's async, it takes a function as second parameter
    Message.create(req.body.message, function () {
      req.flash("success", "Merci pour ce message");
      // redirect to homepage
      res.redirect("/");
    });
  }
});

// * Get all message
app.get("/", (req, res) => {
  let Message = require("./models/message.js");
  // I create a method that will retrieve all messages
  Message.all(function (messages) {
    // I render the page once I have the messages and pass the messages to it
    res.render("pages/index", { messages: messages });
  });
});

// * Get one message
app.get("/message/:id", (req, res) => {
  let Message = require("./models/message.js");
  Message.find(req.params.id, function (message) {
    res.render("messages/show", { message: message });
  });
});

// * Port
app.listen(8080);
