<?php
// * LES CONDITIONS
$isEnabled = true; // La condition d'accès

if ($isEnabled) {
    echo "Vous êtes autorisé(e) à accéder au site ✅";
}
elseif (! $isEnabled) {
    // instructions à exécuter quand on n'est pas autorisé à entrer
    echo "Accès refusé ❌ ";
} 
else {
    echo "Euh, je ne comprends pas ton choix, tu peux me le rappeler s'il te plaît ?";
};


// ? Exemple avec conditions multiples
$isEnabled2 = true;
$isOwner = false;

if ($isEnabled2 && $isOwner) {
    echo 'Accès à la recette validé ✅';
} else {
    echo 'Accès à la recette interdit ! ❌';
}

// ? Exemple avec les symbole OU ||
$isEnabled3 = true;
$isOwner2 = false;
$isAdmin = true;

if (($isEnabled3 && $isOwner2) || $isAdmin) {
    echo 'Accès à la recette validé ✅';
} else {
    echo 'Accès à la recette interdit ! ❌';
}

// $notesB = 12;
$notesB = (int)readline('Entrez votre note :'); // interactif tu dois rentrer ta note (int) converti en entier
if ($notesB > 10) {
    echo 'Bravo vous avez la moyenne';
}else if ($notesB === 10) {
    echo 'Vous avez juste la moyenne';
}else {
    echo 'Dommage vous n\'avez la moyenne';
}


// * SWITCH 
// Le switch ne peut tester que l'égalité.

$action =(int)readline('Entrez votre action : (1: attaquer, 2: défendre, 3: passer mon tour');

switch ($action) {
    case 1:
        echo 'j\'attaque';
        break;
    case 2:
        echo 'je défends';
        break;
    case 3:
        echo 'je ne fais rien';
        break;
    default:
        echo 'commande inconnue';
}

$heure = (int)readline ('Entrez une heure :');

if ((9 <= $heure && $heure <= 12) || (14 <= $heure && $heure <= 17)) {
// if ((9 > $heure || $heure > 12) && (14 > $heure || $heure > 17)) { // si j'inverse la ligne 30
    echo 'le magasin sera ouvert';
} else {
    echo 'le magasin est fermé';
};

/* 
VRAI && VRAI = VRAI
VRAI && FAUX = FAUX
FAUX && FAUX = FAUX

VRAI || VRAI = VRAI
VRAI || FAUX = VRAI
FAUX || FAUX = FAUX
*/

// * TERNAIRES
// elle sert à faire deux choses : 
// Tester la valeur d'une variable dans une condition.

// Affecter une valeur à une variable selon que la condition est vraie ou non.
$userAge = 24;

if ($userAge >= 18) {
	$isAdult = true;
}
else {
	$isAdult = false;
}

// On peu écrire tout cela sur une ligne => 
$isAdult = ($userAge >= 18) ? true : false;

?>