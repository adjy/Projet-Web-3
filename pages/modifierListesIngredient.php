<?php
session_start();
require_once "../config.php";

require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use recette\Donnees;
$gdb = new Donnees();

//var_dump($_POST);
//array(2) { ["Quantité"]=> string(1) "2" ["Unite"]=> string(10) "tablespoon" }

if(isset($_POST['Quantité']) && isset($_POST['Unite']) && isset($_POST['idIngredient']) && isset($_POST['idRecette'])){
    $idrec = (int)$_POST['idRecette'];
    $iding = (int)$_POST['idIngredient'];
    $qtte = htmlspecialchars($_POST['Quantité']);
    $unite = htmlspecialchars($_POST['Unite']);
    $gdb->modifListesIngredient($idrec , $iding,$unite,$qtte);
}





