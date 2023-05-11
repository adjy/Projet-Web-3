<?php
session_start();
require_once "../../config.php";

require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use recette\Donnees;

$gdb = new Donnees();

if(isset($_POST['choixIngredients']) &&
    isset($_POST['idRecette']) && $_POST['Unite'] &&  $_POST['Quantité'] ){

    $ID_ingredient = $_POST['choixIngredients'];
    $ID_recette = $_POST['idRecette'];
    $mesure = $_POST['Unite'];
    $qte = $_POST['Quantité'];

    $gdb->ajoutIngredientRecette($ID_ingredient, $ID_recette, $qte, $mesure);

    $_SESSION['idRecetteRedirection'] = $_SESSION['idRecetteModif'];

}
header("Location:".$GLOBALS['AFFICHAGES']."afficheRecette.php");
exit();
