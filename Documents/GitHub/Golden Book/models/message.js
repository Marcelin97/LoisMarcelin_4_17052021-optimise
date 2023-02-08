let connection = require("./config/db.js");
class Message {
  static create(content, cb) {
    // ? https://www.npmjs.com/package/mysql#escaping-query-values
    // je me sert de ma connection
    // j'utilise ma méthode query
    connection.query(
      // je fais ma requête
      "INSERT INTO tuto_messages SET content = ?, created_at = ?",
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
}
module.exports = Message;
