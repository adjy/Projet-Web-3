<?php
require_once "config.php" ;
session_start();

$logged = isset($_SESSION['nickname']) ;

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template ;
use recette\Recette;
use recette\AfficheRecette;

$gdb = new Recette() ;
$affiche = new AfficheRecette();

ob_start() ;

$recettes = $gdb->getRecettes();
$tags = $gdb->getTagRecettes();
$listesTags = $gdb->getListesTagRecettes();
//$_SESSION['tag'] = $tags;


if( isset( $_SESSION['rechercheRecette'])) {
    //  var_dump( $_SESSION['rechercheRecette']);
    $recettesRecherchee =  $_SESSION['rechercheRecette'];
    $affiche->ListesRecherches($recettesRecherchee);
    unset($_SESSION['rechercheRecette']);//pour effacer automatiquement la recherche apres avoir recherché
}

?>
    <div class="index centrer">
        <img class="banner" src="<?=$GLOBALS['IMG_DIR']?>src/banner.png " alt="banner">
        <span class="info">Découvrez notre sélection de délicieuses recettes, simples à réaliser chez vous,
        pour régaler vos papilles et épater vos convives !</span>
        <?php
            $affiche->ListesRecettes($tags, $listesTags,$recettes);
        ?>
    </div>
<?php

$content = ob_get_clean();
$title = "The Taste Experience";
Template::render($content, $title);