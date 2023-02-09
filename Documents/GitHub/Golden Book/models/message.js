// j'appel mon fichier de connexion à ma bd
let connection = require("../config/db.js");

// j'appel mon fichier gestion des dates
let moment = require('../config/moment.js')


class Message {

  constructor (row){
    this.row = row
  }

  get content (){
    return this.row.content
  }

  get created_at (){
    return moment(this.row.created_at)
  }

  get id (){
    return this.row.id
  }

  static create(content, cb) {
    // ? https://www.npmjs.com/package/mysql#escaping-query-values
    // je me sert de ma connection
    // j'utilise ma méthode query
    connection.query(
      // je fais ma requête
      "INSERT INTO messages SET content = ?, created_at = ?",
      //   en seconde paramètre je luis précise un tableau avec les valeurs que je souhaite insérer
      [content, new Date()],
      //   en troisième paramètre cela prend une fonction qui sera exécuté qui prendra en paramètre l'erreur et le résultat
      (error, result) => {
        // si erreur
        if (error) throw error;
        // je récupère le callBack de ma fonction dans server.js ligne 57
        cb(result);
      }
    );
  }
  static all(cb) {
    connection.query("SELECT * FROM messages", (error, rows) => {
      if (error) throw error;

      // je map sur les lignes de mon tableau
      cb(rows.map((row) => new Message(row)));
    });
  }
  static find(id, cb) {
    connection.query("SELECT * FROM messages WHERE id = ? LIMIT 1", [id], (error, rows) => {
      if (error) throw error;

      
      cb(new Message(rows[0]));
    });
  }
  
}
module.exports = Message;
