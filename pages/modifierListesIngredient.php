<?php
session_start();
require_once "../config.php";

require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use recette\Donnees;
$gdb = new Donnees();


//modification d un ingredient !
if(isset($_POST['Quantité']) && isset($_POST['Unite']) && isset($_POST['idIngredient']) && isset($_POST['idRecette'])){
    $idrec = (int)$_POST['idRecette'];
    $iding = (int)$_POST['idIngredient'];
    $qtte = htmlspecialchars($_POST['Quantité']);
    $unite = htmlspecialchars($_POST['Unite']);
    $gdb->modifListesIngredient($idrec , $iding,$unite,$qtte);
}

//ajout des caracteristiques d'un ingredient deja existant !
if(isset($_POST['choixIngredients']) && isset($_POST['Quantité1']) && isset($_POST['Unite1']) && isset($_POST['idRecette'])){
    $idrec = (int)$_POST['idRecette'];
    $iding = (int)$_POST['choixIngredients'];
    $qtte = htmlspecialchars($_POST['Quantité1']);
    $unite = htmlspecialchars($_POST['Unite1']);
    $gdb->modifListesIngredient($idrec , $iding,$unite,$qtte);
}

else{
    header("Location:".$GLOBALS['DOCUMENT_DIR']."index.php");
    exit();
}






