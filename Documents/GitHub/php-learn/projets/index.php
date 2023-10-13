<?php session_start(); // $_SESSION 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <!-- Inclusion de l'entête du site avec la navigation -->
        <?php include_once('header.php'); ?>

        <!-- Inclusion du formulaire de connexion -->
        <?php include_once('login.php'); ?>

        <h1>Site de recettes</h1>

        <?php if (isset($loggedUser)) : ?>
            <?php foreach (get_recipes($recipes, $limit) as $recipe) : ?>
                <article>
                    <h3><?php echo ($recipe['title']); ?></h3>
                    <div><?php echo ($recipe['recipe']); ?></div>
                    <i><?php echo (display_author($recipe['author'], $users)); ?></i>
                    <?php if(isset($loggedUser) && $recipe['author'] === $loggedUser['email']): ?>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><a class="link-warning" href="./recipes/update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a></li>
                        <li class="list-group-item"><a class="link-danger" href="./recipes/delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a></li>
                        
                    </ul>
                <?php endif; ?>
                </article>
            <?php endforeach ?>
        <?php endif; ?>
    </div>

    <!-- inclusion du footer -->
    <?php include_once('footer.php'); ?>
</body>

</html>