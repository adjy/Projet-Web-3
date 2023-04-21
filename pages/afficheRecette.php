<?php
session_start();
require_once "../config.php";


require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use recette\Template;
use recette\AfficheRecette;
use recette\Recette;


$gdb = new Recette() ;
$affiche = new AfficheRecette();
$recettes = $gdb->getRecettes();
$ListesIng = $gdb->getListesIngredients();
$ingredient = $gdb->getIngredient();
$Listestag = $gdb->getListesTagRecettes();

ob_start();


?>
    <script src="../Javascript/main.js" ></script>
    <link rel="stylesheet" href="../css/main.css">
<?php

if(isset($_POST['Id_recette'])){
   $affiche->UneRecette($_POST['Id_recette'],$recettes,$ListesIng,$ingredient,$Listestag);
}




$content = ob_get_clean();
Template::render($content, $title = "Ajout Recette");
