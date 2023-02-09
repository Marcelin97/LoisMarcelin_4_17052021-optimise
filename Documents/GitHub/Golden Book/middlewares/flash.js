// * création d'un middleware
module.exports = function (req, res, next) {
  // gestion si message flash dans ma session
  if (req.session.flash) {
    // crée une variable local qui va s'appeler flash
    res.locals.flash = req.session.flash;
    // après tu les supprimes
    req.session.flash = undefined;
  }

  req.flash = function (type, content) {
    // gestion dans le cas ou mon objet flash n'existe pas
    if (req.session.flash === undefined) {
      req.session.flash = {};
    }
    // il stock dans la session le message
    // ex: req.session.flash.error
    req.session.flash[type] = content;
  }
  next()
};
