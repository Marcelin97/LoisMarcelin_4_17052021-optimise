<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../config/user.php');
include_once('./../assets/variables.php');

if (!isset($_POST['id']))
{
	echo 'Il faut un identifiant valide pour supprimer une recette.';
    return;
}	

$id = $_POST['id'];

$deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$deleteRecipeStatement->execute([
    'id' => $id,
]) or die(print_r($db->errorInfo())); // force l'affichage de l'erreur en SQL s'il y en a une

header('Location: '.$rootUrl.'projets/index.php');
