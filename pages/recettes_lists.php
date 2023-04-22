<?php
require_once "../config.php" ;
session_start();

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template;
use recette\Donnees;

$gdb = new Donnees() ;
ob_start() ;
$recettes = $gdb->getRecettes();
foreach ($recettes as $rec): ?>
    <li><?= $rec->titre ?></li>
<?php endforeach;
$content = ob_get_clean();
Template::render($content, $title = "Liste des recettes");
