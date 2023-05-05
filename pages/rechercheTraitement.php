<?php
require_once "../config.php" ;
session_start();

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Donnees;

$recette = new Donnees();
if(isset($_POST['fname']) ){
    $mots = trim($_POST['fname']);
    $tabMots = explode(" ",$mots);
    foreach($tabMots as $mot){
        $termes = htmlspecialchars($mot);
        $recherche = $recette->rechercheTerme($termes);
        if(isset($_SESSION['rechercheRecette'])){
            foreach ($recherche as $rch)
                array_push($_SESSION['rechercheRecette'],$rch);
        }
        else
            $_SESSION['rechercheRecette'] = $recherche;
    }
    header("Location:".$_SERVER['HTTP_REFERER']);
    exit();
}