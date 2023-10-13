<?php
// * LES VARIABLES

$nom = 'Mathieu';
echo "$nom";

$note = 10;
$note2 = 12;
echo ($note + $note2) / 2;

// * CONCATENATION

// Concaténez avec des guillemets doubles
// ? Vous pouvez écrire le nom de la variable au milieu du texte et il sera remplacé par sa valeur.
$fullname = "Mathieu Nebra";
echo "Bonjour $fullname et bienvenue sur le site !";

// Concaténez avec des guillemets simples
$fullname = 'Mathieu Nebra';
echo 'Bonjour ' . $fullname . ' et bienvenue sur le site !';

$prenom = 'Paul';
$nom = 'Doe';
echo $prenom . " " . $nom;

$prenom = 'Marc';
$nom = 'Loup';
$note1 = 10;
$note2 = 13;
$moyenne = ($note1 + $note2) / 2;

echo 'Bonjour ' . $prenom . ' ' . $nom . ' vous avez eu ' . ($note1 + $note2) / 2 . ' de moyenne. ';
echo "\n Bonjour $prenom $nom vous avez eu $moyenne de moyenne. ";


$variable1 = "\n Mon \"nom\" est Mathieu";
$variable2 = 'Je m\'appelle Mathieu';
echo $variable1;

// * LE MODULO

// Le modulo Cela représente le reste de la division entière
// Par exemple, 6 / 3 = 2 et il n'y a pas de reste. En revanche, 7 / 3 = 2 (car le nombre 3 « rentre » 2 fois dans le nombre 7) et il reste 1. 
$number1 = 10 % 5; // $number prend la valeur 0 car la division tombe juste
$number2 = 10 % 3; // $number prend la valeur 1 car il reste 1

// * LES TABLEAUX
$tab = [10, 20];
// $tab = array(10, 20) // ancien format php
echo $tab[1]; //find index 1 in the array

$eleve = [
    'nom' => 'Doe',
    'prenom' => 'Marc',
    'notes' => [10, 20, 13]
];

$eleve['prenom'] = 'Jean'; // je remplace la variable
echo $eleve['prenom'] . ' ' . $eleve['nom'];
$eleve['notes'][] = 16; // J'ajoute une note à l'index suivant

echo '<pre>'; // les retours à la ligne pour print_r
print_r($eleve['notes']);
echo '<pre>'; // les retours à la ligne pour print_r

$classe = [
    [
        'nom' => 'Doe',
        'prenom' => 'James',
        'notes' => [15, 14, 13]
    ],
    [
        'nom' => 'Boubou',
        'prenom' => 'Jennifer',
        'notes' => [12, 11, 18]
    ],
];
echo $classe[1]['notes'][1]; // Je récupère mon second élève et sa deuxième note
