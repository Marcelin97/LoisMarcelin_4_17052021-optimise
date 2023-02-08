var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "golden_book",
});

connection.connect();

module.exports = connection;
