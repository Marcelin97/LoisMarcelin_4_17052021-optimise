<?php
// * APPELEZ UNE FONCTION

allowRecipe(); // Ceci est une fonction imaginaire
// ? on veut lui envoyer un paramètre (un nombre, une chaîne de caractères, un booléen...), il faut l'écrire entre les parenthèses :

// =>> Exemple : 
/**
 * Il n'est pas nécessaire de déclarer une variable $recipe
 * pour passer l'information en tant que paramètre d'une fonction.
 */
allowRecipe([
    'title' => 'Escalope milanaise',
    'recipe' => '',
    'author' => 'mathieu.nebra@exemple.com',
    'is_enabled' => true,
]);

// Ainsi, allowRecipe saura qu'elle doit travailler avec le tableau PHP passé en paramètre.
// Souvent, les fonctions acceptent plusieurs paramètres. Vous devez dans ce cas les séparer par des virgules :

// * RECUPEREZ LA VALEUR DE RETOUR DE LA FONCTION
// ? Il y a en effet deux types de fonctions :
// 1. Celles qui ne retournent aucune valeur (ça ne les empêche pas d'effectuer des actions).
// 2. Celles qui retournent une valeur.

// si la fonction retourne une valeur (comme ça devrait être le cas pour allowRecipe  ), on la récupère dans une variable, comme ceci :
$isAllowed = allowRecipe([
    'title' => 'Escalope milanaise',
    'recipe' => '',
    'author' => 'mathieu.nebra@exemple.com',
    'is_enabled' => true,
]);

if ($isAllowed) {
    echo 'La recette doit être affichée !';
} else {
    echo 'La recette doit être cachée !';
}
/**
 * La fonction allowRecipe est appelée avec un tableau en paramètre.
 * Le résultat renvoyé par la fonction (lorsqu'elle a terminé) est stocké dans la variable  $isAllowed  .
 * La variable $isAllowed aura donc pour valeur true après l'exécution de cette ligne de code !
 */

// * Manipulez du texte avec les fonctions
// 1. strlen pour calculer la longueur d'une chaîne de caractères ;
// 2. str_replace pour rechercher et remplacer une chaîne de caractères ;
// 3. sprintf pour formater une chaîne de caractères.

// Calculez la longueur d'une chaîne de caractères avec strlen
$recipe = 'Etape 1 : des flageolets ! Etape 2 : de la saucisse toulousaine';
$length = strlen($recipe);
 
 
echo 'La phrase ci-dessous comporte ' . $length . ' caractères :' . PHP_EOL . $recipe;

// Recherchez et remplacez une chaîne de caractères avec str_replace
echo str_replace('c', 'C', 'le cassoulet, c\'est très bon');
// ? On a besoin d'indiquer trois paramètres :
// 1. La chaîne qu'on recherche – ici, les « c » (on aurait pu rechercher un mot aussi).
// 2. La chaîne qu'on veut mettre à la place – ici, on met des « C » à la place des « c ».
// 3. La chaîne dans laquelle on doit faire la recherche.

// Formatez une chaîne de caractères avec sprintf
// =>> Exemple : 
$recipe = [
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
    'author' => 'laurene.castor@exemple.com',
];

echo sprintf(
    '%s par "%s" : %s',
    $recipe['title'],
    $recipe['author'],
    $recipe['recipe']
);

// Salade Romaine par "laurene.castor@exemple.com" : Etape 1 : Lavez la salade ; Etape 2 : euh ...


// Récupérez la date
// =>> Exemple :
// Enregistrons les informations de date dans des variables

$day = date('d');
$month = date('m');
$year = date('Y');

$hour = date('H');
$minut = date('i');

// Maintenant on peut afficher ce qu'on a recueilli
echo 'Bonjour ! Nous sommes le ' . $day . '/' . $month . '/' . $year . 'et il est ' . $hour. ' h ' . $minut;


// * CRÉEZ VOS PROPRES FONCTIONS
// Exemple 1 : vérifiez la validité d'une recette
$recipe = [
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
    'author' => 'laurene.castor@exemple.com',
    'is_enabled' => true,
];

// au minimum
if ($recipe['is_enabled']) {
    return true;
} else {
    return false;
}

// mieux
$isEnabled = $recipe['is_enabled'];

// encore mieux !
if (array_key_exists('is_enabled', $recipe)) {
    $isEnabled = $recipe['is_enabled'];
} else {
    $isEnabled = false;
}

// =>> la meme chose avec une fonction : 
function isValidRecipe(array $recipe) : bool
// entre parenthèse on peut définir le type de variable ici on préfique $recipe par le mot clé array
// Notre fonction peut aussi – et c'est une deuxième bonne pratique – donner un type de retour, c'est-à-dire le type de valeur que la fonction doit retourner.
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

// Exemple 2 : récupérez les recettes "valides"
// Nous venons de créer la fonction qui permet de vérifier qu'une recette est valide, il nous manque maintenant à boucler sur la liste des recettes

// Exemple 3 : affichez le nom de l'auteur
// Cette fois, la problématique est de relier l'e-mail associé à un compte utilisateur à l'e-mail utilisé pour la contribution d'une recette.

// Si on découpe le problème en étapes, vous avez déjà toutes les connaissances nécessaires :

// Boucler sur les recettes valides.

// Prendre l'e-mail.

// Boucler sur les utilisateurs de la plateforme.

// Si les e-mails correspondent, prendre le nom.

// Sinon, continuer à parcourir la liste des utilisateurs.
?>