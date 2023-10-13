<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../config/user.php');
include_once('./../assets/variables.php');

// contrôle supplémentaire pour vérifier qu'il s'agit bien de la recette qu'on veut modifier
if (
    !isset($_POST['id'])
    || !isset($_POST['title'])
    || !isset($_POST['recipe'])
) {
    echo 'Il manque des informations pour permettre l\'édition du formulaire.';
    return;
}

$id = $_POST['id'];
$title = $_POST['title'];
$recipe = $_POST['recipe'];

// Faire la modification en base
$updateRecipeStatement = $mysqlClient->prepare('UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id');
$updateRecipeStatement->execute([
    'title' => $title,
    'recipe' => $recipe,
    'id' => $id,
]);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <!-- MESSAGE DE MODIFICATION AVEC SUCCES -->
        <?php include_once($rootPath . '/projets/header.php'); ?>
        <h1>Recette modifiée avec succès !</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title"><?php echo ($title); ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo ($loggedUser['email']); ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo strip_tags($recipe); ?></p>
            </div>
        </div>
    </div>
    <?php include_once($rootPath . '/projets/footer.php'); ?>
</body>

</html>