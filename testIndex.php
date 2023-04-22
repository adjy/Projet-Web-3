<?php
require_once "config.php" ;
session_start();

$logged = isset($_SESSION['nickname']) ;

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template ;
use recette\Donnees;

$gdb = new Donnees() ;

ob_start() ; ?>


<!-- affichage de ma recette -->
<div class="recette">
    <div class="nom-recette">Triple Chocolate Cheesecake </div> <!--Nom de la recette-->
    <!-- photo de la recette -->
    <img class = "image-recette" src="../images/recettes/Triple_Chocolate_Cheesecake.jpeg" alt="" />

    <!-- ingredients de la recette  -->

    <div class="description-recette">
        <div class="titleIngredientsRecette"> Ingredients</div>
    </div>
<!---->
        <div class="list-ingredients">
<!--            Pour realiser cette recette, vous aurez besoin de:-->
            <li class = "ingredient">
                <img class = "image-ingredient" src="../images/ingredients/eggs.png" alt="" />
                <div class="infos-ingre"> 4 </div>
                <div class="infos-ingre">l</div>
                <div class="infos-ingre">eggs</div>
            </li>

            <li class = "ingredient">
                <img class = "image-ingredient" src="../images/ingredients/eggs.png" alt="" />
                <div class="infos-ingre"> 3 </div>
                <div class="infos-ingre">grammes</div>
                <div class="infos-ingre">sucres</div>
            </li>

            <li class = "ingredient">
                <img class = "image-ingredient" src="../images/ingredients/eggs.png" alt="" />
                <div class="infos-ingre"> 3 </div>
                <div class="infos-ingre">grammes</div>
                <div class="infos-ingre">sucres</div>
            </li><li class = "ingredient">
                <img class = "image-ingredient" src="../images/ingredients/eggs.png" alt="" />
                <div class="infos-ingre"> 3 </div>
                <div class="infos-ingre">grammes</div>
                <div class="infos-ingre">sucres</div>
            </li><li class = "ingredient">
                <img class = "image-ingredient" src="../images/ingredients/eggs.png" alt="" />
                <div class="infos-ingre"> 3 </div>
                <div class="infos-ingre">grammes</div>
                <div class="infos-ingre">sucres</div>
            </li><li class = "ingredient">
                <img class = "image-ingredient" src="../images/ingredients/eggs.png" alt="" />
                <div class="infos-ingre"> 3 </div>
                <div class="infos-ingre">grammes</div>
                <div class="infos-ingre">sucres</div>
            </li><li class = "ingredient">
                <img class = "image-ingredient" src="../images/ingredients/eggs.png" alt="" />
                <div class="infos-ingre"> 3 </div>
                <div class="infos-ingre">grammes</div>
                <div class="infos-ingre">sucres</div>
            </li>
    </div>
    <div class="description">
        Triple Chocolate Cheesecake with an Oreo crust and a rich chocolate glaze is a decadent dessert that is ultra creamy and smooth. If you are a chocolate lover, this cheesecake with THREE different chocolate layers is for you!"    </div>
</div>
<!---->
  <!-- affichage de Quelques recette qui appartiennet au meme categorie -->
  <div class="categorieRecettes centrer">
    <div class="title-Recette-index">Quelques recettes de ...</div>

    <div class="liste-Recette-index centrer">

        <div class="recette-index centrer">
            <div class="photo-recette">
                <img class = "image-recette-index" src="../images/recettes/Triple_Chocolate_Cheesecake.jpeg" alt="Dinosaur" />
            </div>
            <div class="nom-recette-index">
                triple Chocolate Cheesecake
            </div>
        </div>

        <div class="recette-index centrer">
            <div class="photo-recette">
                <img class = "image-recette-index" src="../images/recettes/Triple_Chocolate_Cheesecake.jpeg" alt="Dinosaur" />
            </div>
            <div class="nom-recette-index">
                triple Chocolate Cheesecake
            </div>
        </div>

        <div class="recette-index centrer">
            <div class="photo-recette">
                <img class = "image-recette-index" src="../images/recettes/Triple_Chocolate_Cheesecake.jpeg" alt="Dinosaur" />
            </div>
            <div class="nom-recette-index">
                triple Chocolate Cheesecake
            </div>
        </div>

        <div class="recette-index centrer">
            <div class="photo-recette">
                <img class = "image-recette-index" src="../images/recettes/Triple_Chocolate_Cheesecake.jpeg" alt="Dinosaur" />
            </div>
            <div class="nom-recette-index">
                triple Chocolate Cheesecake
            </div>
        </div>


    </div>
</div>
<?php
$content = ob_get_clean();
$title = "The Taste Experience";
Template::render($content, $title);