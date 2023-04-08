<?php
require_once "../config.php" ;
session_start();

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template;

ob_start() ;

if(isset($_SESSION['username'])){?>

    <div class="supprimer-recette">
        <div class="titleSuppression">Supprimer une recette</div>
        <form method="post" action="" class="" id="supprimer-recette-form">
            <input class = "input-search supp-search" type="text" id="fname" name="fname" placeholder="recherche supprimer">
            <input class= "btn search-btn" type="submit" value="Search">
        </form>
        <div class="supp">
            <div class="recette-aSupprimer centrer">
                <div class="nom-recetteSupprimer">Triple Chocolate Cheesecake</div>
                <form class="cadre-aSupprimer">
                    <img class = "image-supprimer" src="../images/recettes/Banana_Pudding_Dessert.png" alt="" />
                    <button type="submit" id = "" class="btn-suppID btn btn-supp">X</button>
                </form>
            </div>

            <div class="recette-aSupprimer centrer">
                <div class="nom-recetteSupprimer">Triple Chocolate Cheesecake</div>
                <form class="cadre-aSupprimer">
                    <img class = "image-supprimer" src="../images/recettes/Banana_Pudding_Dessert.png" alt="" />
                    <button type="submit" id = "" class="btn-suppID btn btn-supp">X</button>
                </form>
            </div>

            <div class="recette-aSupprimer centrer">
                <div class="nom-recetteSupprimer">Triple Chocolate Cheesecake</div>
                <form class="cadre-aSupprimer">
                    <img class = "image-supprimer" src="../images/recettes/Banana_Pudding_Dessert.png" alt="" />
                    <button type="submit" id = "" class="btn-suppID btn btn-supp">X</button>
                </form>
            </div>

            <div class="recette-aSupprimer centrer">
                <div class="nom-recetteSupprimer">Triple Chocolate Cheesecake</div>
                <form class="cadre-aSupprimer">
                    <img class = "image-supprimer" src="../images/recettes/Banana_Pudding_Dessert.png" alt="" />
                    <button type="submit" id = "" class="btn-suppID btn btn-supp">X</button>
                </form>
            </div>

            <div class="recette-aSupprimer centrer">
                <div class="nom-recetteSupprimer">Triple Chocolate Cheesecake</div>
                <form class="cadre-aSupprimer">
                    <img class = "image-supprimer" src="../images/recettes/Banana_Pudding_Dessert.png" alt="" />
                    <button type="submit" id = "" class="btn-suppID btn btn-supp">X</button>
                </form>
            </div>

            <div class="recette-aSupprimer centrer">
                <div class="nom-recetteSupprimer">Triple Chocolate Cheesecake</div>
                <form class="cadre-aSupprimer">
                    <img class = "image-supprimer" src="../images/recettes/Banana_Pudding_Dessert.png" alt="" />
                    <button type="submit" id = "" class="btn-suppID btn btn-supp">X</button>
                </form>
            </div>

        </div>


    </div>
    <script src = "<?= $GLOBALS['JS_DIR'] ?>supprimer_recette.js"></script>
    <script src = "<?= $GLOBALS['JS_DIR'] ?>admin.js"></script>


    <?php
}
else{?>
    problem
    <?php
}

$content = ob_get_clean();
Template::render($content, $title = "Supprimer recettes");
