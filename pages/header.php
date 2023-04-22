<?php
use recette\Formulaires;
use recette\Affichages;
use recette\Donnees;

$gdb = new Donnees();
$recettes = $gdb->getRecettes();
$formulaire = new Formulaires();
$affichage = new Affichages();
?>
<header id = "header">

    <div class="part1 centrer">
       <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php" class="title centrer"><img class="img-logo" src ="<?= $GLOBALS['IMG_DIR']?>src/logo.png"/></a>
        <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php" class="btn-head home">Accueil</a>
        <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php#idCat" class="btn-head home">Catégories</a>
        <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php#idRec" class="btn-head home">Recettes</a>



<!--        <div id="menu">-->
<!---->
<!--        </div>-->

        <div class="logMenu">

            <?php

            if(isset($_SESSION['username'])){?>
                <a class = "btn-head" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/admSpace.php" >Admin</a>
                <a class = "btn-head" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/logout.php" >Logout</a>

                <?php
            }
            else{?>
                <a class = "btn-head" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/login.php">Sign in</a>
                <?php
            }
            ?>

        </div>
    </div>

    <div class="search centrer"><?php
        $formulaire->RechecherForm();
         ?>
    </div>

    <?php
        if (isset($_SESSION['rechercheRecette'])) {
        $recettesRecherchee = $_SESSION['rechercheRecette'];
        $affichage->AfficherListesRecherches($recettesRecherchee,$recettes);
        unset($_SESSION['rechercheRecette']);//pour effacer automatiquement la recherche apres avoir recherché
        }
    ?>







</header>