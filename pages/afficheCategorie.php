<?php
session_start();
require_once "../config.php";


require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use recette\Template;
use recette\Affichages;
use recette\Donnees;

$gdb = new Donnees() ;
$affiche = new Affichages();
$recettes = $gdb->getRecettes();
$Listescategorie = $gdb->getListescategorieRecettes();
$categories = $gdb->getcategorieRecettes();

ob_start();
?>
<!--    <script src="../Javascript/main.js" ></script>-->
<!--    <link rel="stylesheet" href="../css/main.css">-->
<?php

if(isset($_POST['Id_categorie'])){
    $affiche->AfficherParCategorie($_POST['Id_categorie'],$Listescategorie,$categories,$recettes);
}




$content = ob_get_clean();
Template::render($content, $title = "Ajout Donnees");
