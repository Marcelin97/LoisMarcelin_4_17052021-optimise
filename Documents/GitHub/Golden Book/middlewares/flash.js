// * creation of a middleware for the management of the messages
module.exports = function (req, res, next) {
  // if my session picks up a message
  if (req.session.flash) {
    // if I have a message I integrate it locally
    res.locals.flash = req.session.flash;
    // once retrieved you set it to undefined
    req.session.flash = undefined;
  }

  req.flash = function (type, content) {
    // management in case my flash object does not exist
    if (req.session.flash === undefined) {
      req.session.flash = {};
    }
    // store the message in the session
    // ex: req.session.flash.error
    req.session.flash[type] = content;
  };
  next();
};
