<?php
session_start();
require_once "../config.php" ;

if(isset($_POST['nom-tag'])){

    if(!isset($_SESSION['nom-tag']))   $_SESSION['nom-tag'] = array();
    $data = array(
        'nom' =>$_POST['nom-tag']
    );
    array_push( $_SESSION['nom-tag'], $data);
}
header("Location:".$GLOBALS['DOCUMENT_DIR']."pages/ajout.php");
exit();
