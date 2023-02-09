//  I call my connection file to my bd
let connection = require("../config/db.js");

// I call my date management file
let moment = require("../config/moment.js");

// * I create my message class
class Message {
  // I destructure my table to retrieve row by row
  constructor(row) {
    this.row = row;
  }

  // I get my line back with the message
  get content() {
    return this.row.content;
  }

  // I get my line back with the time
  get created_at() {
    return moment(this.row.created_at);
  }
  // I get the id of my message
  get id() {
    return this.row.id;
  }

  // the word 'static' allows to define a static method of a class
  // * Method for create a message
  static create(content, cb) {
    // ? https://www.npmjs.com/package/mysql#escaping-query-values
    // I use my connection
    // I use my query method
    connection.query(
      // I make my request SQL
      "INSERT INTO messages SET content = ?, created_at = ?",
      // in second parameter I tell him that it will be an array with the values that I want to insert
      [content, new Date()],
      // in third parameter I create a function which takes in parameter the error and the result
      (error, result) => {
        // if I have an error
        if (error) throw error;
        // I retrieve the callBack of my function and pass it the result (see server.js line 57)
        cb(result);
      }
    );
  }

  // * Method for all messages
  static all(cb) {
    connection.query("SELECT * FROM messages", (error, rows) => {
      if (error) throw error;
      // I map on the rows of my table
      cb(rows.map((row) => new Message(row)));
    });
  }

  // * Method for one message
  static find(id, cb) {
    connection.query(
      "SELECT * FROM messages WHERE id = ? LIMIT 1",
      [id],
      (error, rows) => {
        if (error) throw error;
        // I get the 1st message back, because I set a limit in my sql query
        cb(new Message(rows[0]));
      }
    );
  }
}
module.exports = Message;
