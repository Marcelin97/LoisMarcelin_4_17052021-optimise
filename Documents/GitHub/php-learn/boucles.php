<?php
// Si vous hésitez entre les deux, il suffit simplement de vous poser la question suivante : « Est-ce que je sais d'avance combien de fois je veux que mes instructions soient répétées ? ».

// Si la réponse est oui, alors la boucle for  est tout indiquée.

// Sinon, alors il vaut mieux utiliser la boucle while

// * WHILE (tant que...)
$lines = 1;
while ($lines <= 10) {
    echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
    $lines++; // $lines = $lines + 1
}

$chiffre = null;

for ($i = 0; $i < 10; $i++) {
    echo "- $i \n ";
}

// incrémentation de 2 en 2, je change mon troisième paramètre
for ($i = 0; $i < 10; $i += 2) {
    echo "- $i \n ";
}

// * for (pour)

$notes = [10, 15, 20];

for ($i = 0; $i < 3; $i++) {
    echo '- ' . $notes[$i] . "\n";
}

$notes2 = [10, 13, 12];
$eleves = [
    'cm2' => 'jean',
    'cm1' => 'marc'
];

// * foreach (pour chaque...)

foreach ($eleves as $classe => $eleves) { //la key ici c'est la classe
    echo "$eleves est dans la classe $classe \n";
}

$eleves2 = [
    'CE1' => ['jean', 'emilie', 'claude'],
    'CE2' => ['jeanne', 'Paul', 'chris', 'kirikou'],
];

foreach ($eleves2 as $classe => $listEleves) {
    echo "La classe $classe : \n";
    foreach ($listEleves as $eleves2) {
        echo "- $eleves2 \n";
    }
    echo "\n";
}

/*  
Demande à l'utilisateur de rentrer une note ou de taper "fin"
chaque note est sauvegardée dans un tableau $notes (pensez $notes[] )
à la fin on affiche le tableau de note sous forme de liste
*/

// tant que l'utilisateur ne tape pas 'fin'
// on ajoute la note tapé au tableau de note
// pour chaque node dans notes 
// on affiche "-note"

$notes3 = [];
$action3 = null;

while ($action3 !== 'fin') {
    $action3 = readline('Entrer une nouvelle note (ou \'fin\ pour terminer la saisie):');
    if ($action3 === 'fin') {
        break;
    } else {
        $notes[] = (int)$action3;
    }
};

foreach ($notes as $note) {
    echo "-$note \n";
};

// On veut demande à l'utilisateur de rentrer les horraires d'ouverture d'un magasin
// On demande à l'utilisateur de rentrer une heure et on lui dira si le magasin est ouvert

// On demande à l'utilisateur de rentrer un créneaux
// on demande l'heure de début et l'heure de fin
// on vérifie que l'heure de début est inférieur à l'heure de fin
// on demande si on veut rajouter un nouveau créneaux (o/n)
// on demande à l'utilisateur de rentrer une nouvel heure
// on affiche l'état du magasin

$creneaux = [];
while (true) {
    $debut = (int)readline('Heure d\ouverture :');
    $fin = (int)readline('Heure de fin :');
    if ($debut >= $fin){
        echo "Le créneaux ne peut pas être enregistré car l'heure de d'ouverture ($début) est supérieur à l'heure de fin.";
    }else{
        $creneaux[] = [$debut, $fin];
        $action = readline('Voulez-vous enregistrer un nouveau créneau (o/n)');
        if ($action === 'n'){
            break;
        }
    }
}

$heure = (int)readline("A quelle heure voulez-vous visiter le magasin ?");
$creneauxTrouve = false;

foreach($creneaux as $creneau){
    if ($heure >= $creneau[0] && $heure <= $creneau[1])
    $creneauxTrouve = true;
    break;
}

if ($creneauxTrouve){
    echo 'le magasin sera ouvert';
}else{
    echo 'le magasin sera fermé';
}