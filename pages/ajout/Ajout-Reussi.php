<?php
session_start();
require_once "../../config.php";

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template;

ob_start() ;
?>
<h2>AJOUT REUSSI &#x2714; </h2>
<?php
$content = ob_get_clean();

Template::render($content, $title = "Ajout Donnees");
