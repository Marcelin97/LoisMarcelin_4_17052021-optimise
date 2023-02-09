// * my connection to my database
var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "golden_book",
});

// I connect
connection.connect();

module.exports = connection;
