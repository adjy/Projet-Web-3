<?php
require_once "config.php" ;
session_start();

$logged = isset($_SESSION['nickname']) ;

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template ;
use recette\Recette;

$gdb = new Recette() ;

ob_start() ;

$recettes = $gdb->getRecettes();
$tags = $gdb->getTagRecettes();
$listesTags = $gdb->getListesTagRecettes();
//$_SESSION['tag'] = $tags;


if( isset( $_SESSION['rechercheRecette'])) {
    //  var_dump( $_SESSION['rechercheRecette']);
    $recettesRecherchee =  $_SESSION['rechercheRecette'];
    foreach ($recettesRecherchee as $rec): ?>
        <div class="recette-index centrer">
            <div class="photo-recette centrer">
                <img class = "image-recette-index" src="<?= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?>" alt="" />
            </div>
            <div class="nom-recette-index centrer">
                <?= $rec->titre ?>
            </div>
        </div>
    <?php endforeach;
    unset($_SESSION['rechercheRecette']);//pour effacer automatiquement la recherche apres avoir recherché
}

?>
    <div class="index centrer">
        <img class="banner" src="<?=$GLOBALS['IMG_DIR']?>src/banner.png " alt="banner">
        <span class="info">Découvrez notre sélection de délicieuses recettes, simples à réaliser chez vous,
        pour régaler vos papilles et épater vos convives !</span>
        <?php  foreach ($tags as $t) :?>
            <div class="categorieRecettes centrer"><!-- genere un block de categorie -->
                <h1 class="title-Recette-index"> <?= $t->nom ?> </h1>

                <form method="post" class="liste-Recette-index centrer">
                    <?php  foreach ($listesTags as $listes) : ?>
                        <?php if($listes->ID_tag == $t->ID_tag) : ?>
                            <!-- ensemble de recette qui appartiennent a cette categorie -->
                            <?php foreach ($recettes as $rec): ?>
                                <?php if($rec->ID_recette == $listes->ID_recette) : ?>
                                    <div class="recette-index centrer">
                                        <div class="photo-recette centrer">
                                            <img class = "image-recette-index" src="<?= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?>" alt="" />
                                        </div>
                                        <div class="nom-recette-index centrer">
                                            <?= $rec->titre ?>
                                        </div>
                                        <input type="radio" id="<?= $rec->ID_recette ?>" value="<?= $rec->ID_recette ?>">
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endif;?>
                    <?php endforeach;?>
                </form>
            </div>
        <?php endforeach;?>
    </div>
<?php

$content = ob_get_clean();
$title = "The Taste Experience";
Template::render($content, $title);