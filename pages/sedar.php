<?php
session_start();
require_once "../config.php";


require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use recette\Template;
use recette\Affichages;
use recette\Donnees;


$gdb = new Donnees() ;
$affiche = new Affichages();
$recettes = $gdb->getRecettes();
$ListesIng = $gdb->getListesIngredients();
$ingredient = $gdb->getIngredient();
$Listescategorie = $gdb->getListescategorieRecettes();

ob_start();


?>
    <!--    <script src="../Javascript/main.js" ></script>-->
    <!--    <link rel="stylesheet" href="../css/main.css">-->
<?php


$_POST['Id_recette'] = 1;
    $recette = $gdb->rechercheRecette($_POST['Id_recette'])[0];
    $ingredients = $gdb->rechercheIngredientsRecette($_POST['Id_recette']);
    $recetteMemeCategories = $gdb->rechercheRecetteMemeCategories($_POST['Id_recette']);
    $tags = $gdb->rechercheTagsRecette($_POST['Id_recette']); ?>














                              <?php if(isset($_SESSION['username'])) : ?>
                            <a href="#ID_recette" class="ingredientsModifier">
                                <img class = "pen" src="<?= $GLOBALS['IMG_DIR']."src/pen.svg"?>" alt="pen icon"/>
                            </a>
                        <?php endif;?>

                                                            </li>
                                                                   <!-- Pour modifier un ingredient -->
                                                            <form method="post" class="cadre super_cadre" id="<?= $ingredient->nom?>" enctype="multipart/form-data" action="<?= $GLOBALS['PAGES'] ?>modifierListesIngredient.php">
                                                                <span>Modifier l'ingredients</span>
                    <!--                                            <img class = "ingredient-picture" src="--><?php //= $GLOBALS['IMG_DIR']."ingredients/".$ing->photo ?><!--" alt="" />-->

                                                                <div id="ingredients">
                                                                    <input type="text" class = "ajout-input" id = "qte" name="Quantité" placeholder="Quantité"value ="<?= $ingredient->Qte ?>" >
                                                                    <input class = "ajout-input" type="text" id = "unite" name="Unite" placeholder="unite" value ="<?= $ingredient->mesure ?>">
                                                                    <input type="hidden" name="idRecette" value="<?= $recette->ID_recette ?>">
                                                                     <input type="hidden" name="idIngredient" value="<?= $ingredient->ID_ingredient ?>">
                                                                </div>
                                                                <div class="btn_class">
                                                                    <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>
                                                                    <button type="button" class = "btn annulerBtn" id="" >Annuler</button>
                                                                </div>
                                                            </form>


                                                                         <!--            Pour un nouvel ingredient-->



                                        </div>
            </div>


        </div>
<!--                    <form method="post" class="cadre super_cadre" id="modifierNom"  action="--><?php //= $GLOBALS['DOCUMENT_DIR'] ?><!--pages/modifierRecette.php">-->
<!--                        <span>Modifier le nom</span>-->
<!--                        <input class = "ajout-input" type="text" id = "" name="nom_recette" placeholder="" value="--><?php //= $recette->titre ?><!--">-->
<!---->
<!--                        <div class="btn_class">-->
<!--                            <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>-->
<!--                            <button type="button" class = "btn annulerBtn" id="" >Annuler</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!---->
<!--
<!---->
<!--
<!---->
<!--                    <form method="post" class="cadre super_cadre" id="modifierImage" enctype="multipart/form-data" action="--><?php //= $GLOBALS['DOCUMENT_DIR'] ?><!--pages/modifierRecette.php">-->
<!--                        <span>Modifier l'image</span>-->
<!--                        <input class = "ajout-input" type="file" id = "new-photo-recette" name="new-photo-recette" placeholder="">-->
<!--                        <div class="btn_class">-->
<!--                            <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>-->
<!--                            <button type="button" class = "btn annulerBtn" id="" >Annuler</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!---->
<!--                    <!-- ingredients de la recette  -->-->
<!---->
<!--
<!---->

<!---->
<!--                    <form  method="post" id = "formulaire-ajouter-ingredient" class = "cadre super_cadre"  action=" " >-->
<!--                         <div id="ingredients">-->
<!--                            <div class="subTitle">Ingrédients</div>-->
<!---->
<!--                            --><?php //if(isset($_SESSION['Ingredients'])): ?>
<!--                                <select id="choixIngredients" class="ajout-input" name="choixIngredients">-->
<!--                                    --><?php //foreach  ($_SESSION['Ingredients'] as $ingredient): ?>
<!--<!--                                        <option value="-->--><?php ////= $ingredient->ID_ingredient?><!--<!--">-->--><?php ////= $ingredient->nom ?><!--<!--</option>-->-->
<!--                                        <option value="--><?php //= $ingredient->ID_ingredient?><!--">--><?php //= $ingredient->nom ?><!--</option>-->
<!--                                    --><?php //endforeach;?>
<!--                                </select>-->
<!--                              --><?php //endif;?>
<!---->
<!--                            <input type="text" class = "ajout-input" id = "qte" name="Quantité" placeholder="Quantité" value = "">-->
<!--                            <input class = "ajout-input" type="text" id = "unite" name="Unite" placeholder="unite" value = "">-->
<!--                            <input type="hidden" name="idRecette" value="--><?php //= $recette->ID_recette ?><!--">-->
<!---->
<!--                            <div class="btn_class">-->
<!--                                <button type="submit" class = "btn" id="" >Ajouter un ingrédient</button>-->
<!--                                <a href="#" type="button" class = "btn" id="creerIngredient" >Creer un nouvel ingredient</a>-->
<!--                                <button type="button" class = "btn annulerBtn" id="" >Annuler</button>-->
<!--                            </div>-->
<!---->
<!--                         </div>-->
<!--                    </form>-->
<!---->
<!---->
<!--         <form  method="post" class = "cadre super_cadre" id = "ajout-ingredient-form" action="--><?php //= $GLOBALS['PAGES'] ?><!--ajoutIngredientTraitement.php"  enctype="multipart/form-data">-->
<!--            <div class="Title-Ajout">Ajouter un nouveau ingredient</div>-->
<!--            <div class="ingredients-inputs">-->
<!--                <input class = "ajout-input" type="text" id = "nom-ingredient" name="nomIngredient" placeholder="Entrer le nom de l'ingredient" value = "" required>-->
<!--                <label for="photo-ingredient" class="subTitle"> Photo de l'ingredient</label>-->
<!--                <input type="file" class="ajout-input" id="photo_ingredient" name="photo_ingredient" required>-->
<!--            </div>-->
<!---->
<!--            <div class="btn_class">-->
<!--                <button type="submit" id="ajouter-ingredient-button" class = "btn ValiderBtn" >Ajouter</button>-->
<!--                <button type="button" id="creerIngredient" class = "btn annulerBtn"  >Annuler</button>-->
<!--            </div>-->
<!--        </form>-->
<!---->
<!--        <form method="post" class="cadre super_cadre" id = "modifDescription" action="--><?php //= $GLOBALS['PAGES'] ?><!--modifDescription.php" >-->
<!--            <span>Modifier description</span>-->
<!--            <input type="hidden" name="idRecette" value="--><?php //= $recette->ID_recette ?><!--">-->
<!--            <textarea class="ajout-input" id="description-recette" name="description" placeholder="" required>--><?php //= $recette->description ?><!--</textarea>-->
<!--            <div class="btn_class">-->
<!--                <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>-->
<!--                <button type="button" class = "btn annulerBtn" id="" >Annuler</button>-->
<!--            </div>-->
<!---->
<!--        </form>-->
<!---->
<!--            </div>-->
<!---->
<!---->
<!--            <span  class="info">Si vous avez aimé cette recette, vous devriez essayer ces autres recettes de la même catégorie.-->
<!--                Elles ont toutes des saveurs uniques qui feront saliver vos papilles gustatives !</span>-->
<!---->
<!---->
<!--            <div class="cadre">-->
<!--                <div class="items-cadre">-->
<!--                         <!-- affichage de Quelques recette qui appartiennet au meme categorie -->-->
<!---->
<!--<!--                  -->--><?php ////foreach  ($recetteMemeCategories as $rec){
////                      if($rec->ID_recette != $recette->ID_recette)
////                          $this->formulaire->RecetteForm($rec);
////                  }
////
////                    ?>
<!--                </div>-->
<!--            </div>-->
<!---->



<?php

$content = ob_get_clean();
Template::render($content, $title = "Ajout Donnees");
