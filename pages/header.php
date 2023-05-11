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
            // if(!isset($_SESSION["checked"])) {
             if(!isset($_SESSION['checked'])) {
                $affichage->AfficherListesRecherches($tableauUnique, $recettes);
            }
            else {
                $affichage->AfficherIngredientRecherches($tableauUnique,$ingredients);
                unset($_SESSION['checked']);
            }
      // }

        unset($_SESSION['rechercheRecette']);//pour effacer automatiquement la recherche apres avoir recherché
        }

    ?>







