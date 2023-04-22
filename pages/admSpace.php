<?php
require_once "../config.php" ;
session_start();

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template;
use recette\Affichages;


ob_start() ;

$_SESSION['validation'] = true;

$affiche = new Affichages();
if( isset( $_SESSION['rechercheRecette'])) {
    $recettesRecherchee =  $_SESSION['rechercheRecette'];
    $affiche->AfficherListesRecherches($recettesRecherchee);
    unset($_SESSION['rechercheRecette']);//pour effacer automatiquement la recherche apres avoir recherché
}
if(isset($_SESSION['username'])){?>

    <div class="dashbord">
        dashbord
    </div>

    <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/ajout.php" style="font-size: 0.5cm;text-decoration: none">Ajout</a>
    <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/retirerRecette.php" style="font-size: 0.5cm;text-decoration: none">Retirer</a>
    <?php
}
else{?>
    problem
    <?php
}
$content = ob_get_clean();
Template::render($content, $title = "Admin Space");
