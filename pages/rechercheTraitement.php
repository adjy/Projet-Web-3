<?php
require_once "../config.php" ;
session_start();

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Donnees;

$recette = new Donnees();
if(isset($_POST['fname']) ){
    $termes = htmlspecialchars($_POST['fname'] );
    //var_dump($termes);
    $recherche = $recette->rechercheTerme($termes);
    $_SESSION['rechercheRecette'] = $recherche;
    //var_dump($recherche);
    header("Location:".$_SERVER['HTTP_REFERER']);
    exit();
}