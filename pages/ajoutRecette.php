<?php
session_start();
require_once "../config.php" ;


require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template;
use recette\Recette;
use recette\AjoutFormulaire;

ob_start() ;

if(isset($_SESSION['username'])){
    $_SESSION['listeIngredients'] = array();
    echo "Ajout d'articles !!!";
    $formajout = new AjoutFormulaire();
    $formajout->generateAjoutForm();
}
else{?>
    problem
    <?php
}

$content = ob_get_clean();

Template::render($content, $title = "Ajout Recette");
