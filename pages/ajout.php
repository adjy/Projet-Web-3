<?php
session_start();
require_once "../config.php" ;
if(!isset($_SESSION['username'])){
    header("Location:".$GLOBALS['DOCUMENT_DIR']."pages/login.php");
    exit();
}

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template;
use recette\AjoutFormulaire;

ob_start() ;
$formajout = new AjoutFormulaire();
$formajout->generateAjoutForm();

$content = ob_get_clean();

Template::render($content, $title = "Ajout Recette");
