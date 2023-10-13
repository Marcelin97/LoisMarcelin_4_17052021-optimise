<?php
// * LES TABLEAUX NUMÉROTES
// ! Attention ! Un array numéroté commence toujours à la case n° 0 !

// créer l'array $recipes :
$recipes = ['Cassoulet', 'Couscous', 'Escalope Milanaise', 'Salade César',];

// La fonction array permet aussi de créer un array
$recipes = array('Cassoulet', 'Couscous', 'Escalope Milanaise');

// => Affichez un tableau numéroté
echo $recipes[1]; // Cela affichera : Couscous

// * LES TABLEAUX ASSOCIATIFS
// ! au lieu de numéroter les cases, on va les étiqueter en leur donnant à chacune un nom différent

// Une bien meilleure façon de stocker une recette !
$recipe = [
    'title' => 'Cassoulet', // ? Vous remarquez qu'on écrit une flèche ( => ) pour dire « associé à ».
    'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
    'author' => 'john.doe@exemple.com',
    'enabled' => true,
];

// => Affichez un tableau associatif
echo $recipe['title']; // Cassoulet 

// ? Quand utiliser un tableau numéroté et quand utiliser un tableau associatif ?
// 1. Les tableaux numérotés permettent de stocker une série d'éléments du même type, comme des prénoms. 
// Chaque élément du tableau contiendra alors un prénom.

// 2. Les tableaux associatifs permettent de découper une donnée en plusieurs sous-éléments. 
// Par exemple, une adresse peut être découpée en nom, prénom, nom de rue, ville…


// * PARCOURIR UN TABLEAU
// Nous allons voir trois moyens d'explorer un tableau :

// La boucle =>> for <<=  .
// La boucle =>> foreach <<= .
// La fonction =>> print_r <<= (utilisée principalement pour le déboggage).

// * LA BOUCLE =>> "FOR" 
/**
 * Déclaration du tableau des recettes
 * Chaque élément du tableau est un tableau numéroté (une recette)
 */
$recipes = [
    ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
    ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
];

for ($lines = 0; $lines <= 1; $lines++) {
    echo $recipes[$lines][0];
}

// * LA BOUCLE =>> "FOREACH"
// ? cette boucle est plus adapté aux tableaux

// =>> Exemple :
// Déclaration du tableau des recettes
$recipes = [
    ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
    ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
];

foreach ($recipes as $recipe) {
    echo $recipe[0]; // Affichera Cassoulet, puis Couscous
}

// ? L'avantage de foreach , c'est qu'il permet aussi de parcourir les tableaux associatifs.

// =>> Exemple :
$recipe = [
    'title' => 'Cassoulet',
    'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
    'author' => 'mickael.andrieu@exemple.com',
    'enabled' => true,
];

foreach ($recipe as $value) {
    echo $value;
}

/**
 * AFFICHE
 * CassouletEtape 1 : des flageolets, Etape 2 : ...mickael.andrieu@exemple.com1
 */

// tableau de tableaux :
// =>> Exemple :
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => '',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => '',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => false,
    ],
];

foreach($recipes as $recipe) {
    echo $recipe['title'] . ' contribué(e) par : ' . $recipe['author'] . PHP_EOL; 
}

// ? Or, on peut aussi récupérer la clé de l'élément. On doit dans ce cas écrire foreach  , comme ceci :
foreach($recipe as $property => $propertyValue)

// =>> Exemple : 
$recipe = [
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
    'author' => 'laurene.castor@exemple.com',
];

foreach($recipe as $property => $propertyValue)
{
    echo '[' . $property . '] vaut ' . $propertyValue . PHP_EOL;
}

// * AFFICHEZ RAPIDEMENT UN TABLEAU AVEC =>> "PRINT_R"
// ? Parfois, en codant votre site en PHP, vous aurez sur les bras un tableau et vous voudrez savoir ce qu'il contient, juste pour votre information.
// ! Cette commande a toutefois un défaut : elle ne renvoie pas de code HTML comme <br /> pour les retours à la ligne. Pour bien les voir, il faut donc utiliser la balise HTML <pre>  qui nous permet d'avoir un affichage plus correct.

// =>> Exemple : 
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
];

echo '<pre>';
print_r($recipes);
echo '</pre>';

// * RECHERCHEZ DANS UN TABLEAU
// Nous allons voir trois types de recherches, basées sur des fonctions PHP :

// =>> array_key_exists <<= pour vérifier si une clé existe dans le tableau.
// =>> in_array <<= pour vérifier si une valeur existe dans le tableau.
// =>> array_search <<= pour récupérer la clé d'une valeur dans le tableau.

// * =>> "ARRAY_KEY_EXISTS"
// * =>> "IN_ARRAY"
// * =>> "ARRAY_SEARCH"

// * Vérifiez si une clé existe dans un tableau avec array_key_exists
// On doit lui donner :

// 1. Le nom de la clé à rechercher.
// 2. Puis le nom du tableau dans lequel on fait la recherche :

// array_key_exists('cle', $array); 

// La fonction renvoie un booléen : 
// true (vrai) si la clé est dans le tableau ;
// false (faux) si la clé ne s'y trouve pas.

//  =>> Exemple : 
$recipe = [
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
    'author' => 'laurene.castor@exemple.com',
];

if (array_key_exists('title', $recipe))
{
    echo 'La clé "title" se trouve dans la recette !';
}

if (array_key_exists('commentaires', $recipe))
{
    echo 'La clé "commentaires" se trouve dans la recette !';
}

// * Vérifiez si une valeur existe dans un tableau avec in_array
// ? cette fois on recherche dans les valeurs. 
// in_array renvoie : 
// true si la valeur se trouve dans le tableau ;
// false si elle ne s'y trouve pas.

// =>> Exemple :
$users = [
    'Mathieu Nebra',
    'Mickaël Andrieu',
    'Laurène Castor',
];

if (in_array('Mathieu Nebra', $users))
{
    echo 'Mathieu fait bien partie des utilisateurs enregistrés !';
}

if (in_array('Arlette Chabot', $users))
{
    echo 'Arlette fait bien partie des utilisateurs enregistrés !';
}

// * Récupérez la clé d'une valeur dans un tableau avec array_search
// ? Si elle a trouvé la valeur, array_search renvoie la clé correspondante (dans le cas d'un tableau numéroté, la clé sera un numéro ; dans le cas d'un tableau associatif, la clé sera un nom).
// ? Si elle n'a pas trouvé la valeur, array_search renvoie false
$users = [
    'Mathieu Nebra',
    'Mickaël Andrieu',
    'Laurène Castor',
];

$positionMathieu = array_search('Mathieu Nebra', $users);
echo '"Mathieu" se trouve en position ' . $positionMathieu . PHP_EOL;

$positionLaurène = array_search('Laurène Castor', $users);
echo '"Laurène" se trouve en position ' . $positionLaurène . PHP_EOL;
?>