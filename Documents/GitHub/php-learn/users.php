<?php

$mickael = ['Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'S3cr3t', 34];
$mathieu = ['Mathieu Nebra', 'mathieu.nebra@exemple.com', 'devine', 33];
$laurene = ['Laurène Castor', 'laurene.castor@exemple.com', 'P4ssw0rD', 28];

$users = [$mickael, $mathieu, $laurene];

// echo $users[1][1]; // "mathieu.nebra@exemple.com"

$lines = 3; // nombre d'utilisateurs dans le tableau
$counter = 0;

// * WHILE (Tant que)
// exemple en utilisant la boucle "while"

while ($counter < $lines) {
    echo $users[$counter][0] . ' ' . $users[$counter][1] . '<br />';
    $counter++; // Ne surtout pas oublier la condition de sortie !
}

// * FOR
// for  et while  donnent le même résultat et servent à la même chose : répéter des instructions en boucle.
// exemple en utilisant la boucle "for"

for ($lines = 0; $lines <= 2; $lines++)
// Le premier sert à l'initialisation. C'est la valeur que l'on donne au départ à la variable (ici, elle vaut 0).

// Le second, c'est la condition. Comme pour le while : tant que la condition est remplie, la boucle est réexécutée. Dès que la condition ne l'est plus, on en sort.

// le troisième c'est l'incrémentation. Cela permet d'ajouter 1 à la variable à chaque tour de boucle.
{
    echo $users[$lines][0] . ' ' . $users[$lines][1] . '<br />';
}
?>