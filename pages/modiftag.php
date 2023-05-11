<?php
session_start();
require_once "../config.php";


require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use recette\Donnees;

$gdb = new Donnees();
$listesTags = $gdb->getTag();
$allListesTags  = $gdb->getListestag();

if(isset($_POST['tag']) && isset($_POST['idRecette'])){
    $tag = htmlspecialchars($_POST['tag']);
    $tag = trim($tag);
    $idRecette = (int)$_POST['idRecette'];
    $flag = 1;

    foreach ($listesTags as $t){
        if($t->nom == $tag){
            $idTag = (int)$gdb->getTagId($t->nom);
            foreach ($allListesTags as $tg){
                if( $tg->ID_tag == $idTag ){
                    if($tg->ID_recette != $idRecette) {
                        $gdb->ajoutTagRecette($idTag, $idRecette);
                        $flag = 0;
                        echo "foreach";
                    }
                }
            }
        }
    }

   if($flag == 1){
        $gdb->ajoutTag($tag);
        $idTag = $gdb->getTagId($tag)[0]->ID_tag;
        $gdb->ajoutTagRecette($idTag,$idRecette);
        echo "ajout";
   }
}


