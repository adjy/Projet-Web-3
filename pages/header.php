<?php
use recette\Formulaires;
use recette\Affichages;
use recette\Donnees;

$gdb = new Donnees();
$recettes = $gdb->getRecettes();
$ingredients = $gdb->getIngredient();
$formulaire = new Formulaires();
$affichage = new Affichages();
?>
<header id = "header">

    <div class="part1">
       <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php" class="title"><img class="img-logo" src ="<?= $GLOBALS['IMG_DIR']?>src/logo.png"/></a>
        <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php" class="btn-head home">Accueil</a>
        <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php#idCat" class="btn-head home">Catégories</a>
        <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php#idRec" class="btn-head home">Recettes</a>

        <div class="logMenu">

            <?php

            if(isset($_SESSION['username'])){?>
                <a class = "btn-head" href="<?php echo $GLOBALS['PAGES'] ?>admSpace.php" >Admin</a>
                <a class = "btn-head" href="<?php echo $GLOBALS['AUTHENTIFICATION'] ?>logout.php" >Logout</a>

                <?php
            }
            else{?>
                <a class = "btn-head" href="<?php echo $GLOBALS['AUTHENTIFICATION'] ?>login.php">Sign in</a>
                <?php
            }
            ?>

        </div>
    </div>

    <div class="search"><?php
        $formulaire->RechecherForm();

         ?>
    </div>

</header>

    <?php
        if (isset($_SESSION['rechercheRecette'])) {
            $recettesRecherchee = $_SESSION['rechercheRecette'];
            $tableauUnique = array_unique($recettesRecherchee, SORT_REGULAR);
            $affichage->AfficherListesRecherches($tableauUnique, $recettes);
            unset($_SESSION['rechercheRecette']);//pour effacer automatiquement la recherche apres avoir recherché
        }
            if(isset($_SESSION['checkedIngredient'])) {
                $checkedIngredient = $_SESSION['checkedIngredient'];
                $tableauUnique = array_unique($checkedIngredient, SORT_REGULAR);
                $affichage->AfficherIngredientRecherches($tableauUnique);
                unset($_SESSION['checkedIngredient']);
            }
             if(isset($_SESSION['checkedTag'])) {
                 $checkedTag = $_SESSION['checkedTag'];
                 $tableauUnique = array_unique($checkedTag, SORT_REGULAR);
                $affichage->AfficherTagRecherches($tableauUnique);
                unset($_SESSION['checkedTag']);
        }

    ?>







