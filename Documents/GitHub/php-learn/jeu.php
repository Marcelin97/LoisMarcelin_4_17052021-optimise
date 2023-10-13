<?php
include_once('./functions_jeu.php');

$aDeviner = 150;
$error = null;
$success = null;
$value = null;

if (isset($_POST['chiffre'])) {
    $value = (int)$_POST['chiffre'];
    if ($value > $aDeviner) {
        $error = "Votre chiffre est trop grand 😞";
    } elseif ($value < $aDeviner) {
        $error = "Votre chiffre est trop petit 🙄";
    } else {
        $success = "Bravo ! Vous avez deviné le chiffre $aDeviner";
    }
}
?>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php elseif ($success) : ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif ?>


<!-- Form deviner -->
<form action="/jeu.php" method="POST">
    <div class="form-group">
        <input class="form-control" type="number" name="chiffre" placeholder="Entrez un chiffre entre 0 et 100" value="<?= $value ?>" />
    </div>
    <button class="btn btn-primary" type="submit">Deviner</button>
</form>


<?php
// checkbox
$parfums = [
    'fraise' => 1,
    'chocolat'  => 1.2,
    'vanille' => 1,
];

// Radio
$cornets = [
    'pot' => 1,
    'cornet' => 1,
];

// checkbox
$supplements = [
    'pepites de chocolat' => 1.5,
    'chantilly de chocolat' => 0.5
];
$ingredients =[];
$total = 0;

if (isset($_GET['parfum'])){
    foreach ($_GET['parfum'] as $parfum){
       if (isset($parfums[$parfum])){
        $ingredients[] = $parfum;
        $total += $parfums[$parfum];
       }
    }
}

if (isset($_GET['supplement'])){
    foreach ($_GET['supplement'] as $supplement){
       if (isset($supplements[$supplement])){
        $ingredients[] = $supplement;
        $total += $supplements[$supplement];
       }
    }
}

if (isset($_GET['cornet'])){
    $cornet = $_GET['cornet'];
       if (isset($cornets[$cornet])){
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
       }
}
?>
<!-- Form Glace -->
<h1>Composer votre glace</h1>
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Votre glace</h5>
            <ul>
               <?php foreach($ingredients as $ingredient) : ?>
                <li> <?= $ingredient ?> </li>
                <?php endforeach ?>
            </ul>
            <p>Prix de votre glace : <?= $total ?></p>
        </div>
    </div>
</div>
    <div class="col-md-8">
    <form action="/jeu.php" method="GET">
    <h2>Choisissez vos parfums :</h2>
    <?php foreach ($parfums as $parfum => $prix) : ?>
        <div class="checkbox">
            <label>
                <?= checkbox('parfum', $parfum, $_GET) ?>
                <?= $parfum ?> - <?= $prix ?> €
            </label>
        </div>
    <?php endforeach ?>

    <h2>Choisissez votre cornet :</h2>
    <?php foreach ($cornets as $cornet => $prix) : ?>
        <div class="radio">
            <label>
                <?= radio('cornet', $cornet, $_GET) ?>
                <?= $cornet ?> - <?= $prix ?> €
            </label>
        </div>
    <?php endforeach ?>

    <h2>Choisissez vos suppléments: </h2>
    <?php foreach ($supplements as $supplement => $prix) : ?>
        <div class="checkbox">
            <label>
                <?= checkbox('supplement', $supplement, $_GET) ?>
                <?= $supplement ?> - <?= $prix ?> €
            </label>
        </div>
    <?php endforeach ?>

    <button class="btn btn-primary" type="submit">Composer ma glace</button>
</form>
    </div>


<h2>$_GET</h2>
<pre>
    <?php var_dump($_GET) ?>
</pre>

<h2>$_POST</h2>
<pre>
    <?php var_dump($_POST) ?>
</pre>