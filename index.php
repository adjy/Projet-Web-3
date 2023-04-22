<?php
require_once "config.php" ;
session_start();

$logged = isset($_SESSION['nickname']) ;

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template ;
use recette\Donnees;
use recette\Affichages;

$gdb = new Donnees() ;
$affiche = new Affichages();

ob_start() ;

$recettes = $gdb->getRecettes();
$tags = $gdb->getTagRecettes();
$listesTags = $gdb->getListesTagRecettes();

if( isset( $_SESSION['rechercheRecette'])) {
    $recettesRecherchee =  $_SESSION['rechercheRecette'];
    $affiche->AfficherListesRecherches($recettesRecherchee);
    unset($_SESSION['rechercheRecette']);//pour effacer automatiquement la recherche apres avoir recherché
}

?>
    <div class="index centrer">
        <img class="banner" src="<?=$GLOBALS['IMG_DIR']?>src/banner.png " alt="banner">
        <span id="idCat" class="info">Explorez notre collection de recettes de cuisine par catégorie</span>
        <?php
            $affiche->AfficherListesCategories($tags,$gdb);
        ?>
        <span id="idRec" class="info">Découvrez notre sélection de délicieuses recettes, simples à réaliser chez vous,
        pour régaler vos papilles et épater vos convives !</span>
        <?php
            $affiche->AfficherListesRecettes($tags, $listesTags,$recettes);
        ?>
    </div>
<?php


$content = ob_get_clean();
$title = "The Taste Experience";
Template::render($content, $title);