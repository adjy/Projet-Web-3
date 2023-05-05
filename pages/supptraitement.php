<?php
session_start();
require_once "../config.php";

require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();
use recette\Donnees;

$gdb = new Donnees();
$gdb->supprimerRecette($_POST['Id_recette']);
$gdb->miseAjourSupprimer();
header("Location: ".$GLOBALS['DOCUMENT_DIR']."index.php");

exit();
