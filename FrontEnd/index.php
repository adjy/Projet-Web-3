<?php 
session_start();
require_once "config.php" ;
require $GLOBALS['PHP_DIR']."class/Autoloader.php";

Autoloader::register();
use recette\Template;
?>

<?php ob_start() ?>

<?php $content=ob_get_clean() ?>



<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content); ?>
