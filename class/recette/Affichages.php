<?php
namespace recette;

use recette\Formulaires;

class Affichages{
    private $formulaire;
    public function __construct(){
        $this->formulaire = new \recette\Formulaires();
    }

//    public function AfficherRecette($Id_Recette,$ListesRecettes,$ListesIngredients,$Ingredients,$Listescategorie): void{

    public function AfficherRecette($recette,$ingredients,$recetteMemeCategories,$tags): void{?>
        <!-- affichage de ma recette -->
        <script src = "<?= $GLOBALS['JS_DIR']?>modifier.js"></script>

        <div class="recette-cadre" id="ID_recette">
                    <form method="post" class="cadre super_cadre" id="modifierNom"  action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/modifierRecette.php">
                        <span>Modifier le nom</span>
                        <input class = "ajout-input" type="text" id = "" name="nom_recette" placeholder="" value="<?= $recette->titre ?>">

                        <div class="btn_class">
                            <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>
                            <button type="button" class = "btn annulerBtn" id="" >Annuler</button>
                        </div>
                    </form>

                    <div class="recette-name"> <?= $recette->titre ?>
                        <?php if(isset($_SESSION['username'])) : ?>
                            <img class = "pen" id="pen_name" src="<?= $GLOBALS['IMG_DIR']."src/pen.svg"?>"  alt="pen icon"/>
                        <?php endif;?>
                    </div> <!--Nom de la recette-->

                    <!-- photo de la recette -->
                    <div class="position-relative">
                        <img class = "recette-picture " src="<?= $GLOBALS['IMG_DIR']."recettes/".$recette->photo ?>" alt="photo recette" />
                        <?php if(isset($_SESSION['username'])) : ?>
                            <img class = "pen" id="penImages" src="<?= $GLOBALS['IMG_DIR']."src/pen.svg"?>"  alt="pen icon"/>
                        <?php endif;?>
                    </div>

                    <form method="post" class="cadre super_cadre" id="modifierImage" enctype="multipart/form-data" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/modifierRecette.php">
                        <span>Modifier l'image</span>
                        <input class = "ajout-input" type="file" id = "new-photo-recette" name="new-photo-recette" placeholder="">
                        <div class="btn_class">
                            <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>
                            <button type="button" class = "btn annulerBtn" id="" >Annuler</button>
                        </div>
                    </form>

                    <!-- ingredients de la recette  -->

                    <div class="title"> Ingredients <button type="button" id="ajouter_Ingredient_message">+ Ajouter un ingredient</button></div>
                        <div class="ingredients">
                                            <?php foreach  ($ingredients as $ingredient): ?>

                                            <li class = "ingredient position-relative">
                                                <img class = "ingredient-picture" src="<?= $GLOBALS['IMG_DIR']."ingredients/".$ingredient->photo ?>" alt="photos ingredients" />
                                                <div class="ingredient-info"><?= $ingredient->Qte ?> </div>
                                                <div class="ingredient-info"><?= $ingredient->mesure ?></div>
                                                <div class="ingredient-info"><?= $ingredient->nom ?></div>

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

                                    <?php endforeach;?>

                        </div>

                        <div class="description">
                            <?= $recette->description ?> <a href="#ID_recette"> <img class = "pen" id="pen_description" src="<?= $GLOBALS['IMG_DIR']."src/pen.svg"?>"  alt="pen icon"/></a>
                        </div>


                    <form  method="post" id = "formulaire-ajouter-ingredient" class = "cadre super_cadre"  action=" " >
                         <div id="ingredients">
                            <div class="subTitle">Ingrédients</div>

                            <?php if(isset($_SESSION['Ingredients'])): ?>
                                <select id="choixIngredients" class="ajout-input" name="choixIngredients">
                                    <?php foreach  ($_SESSION['Ingredients'] as $ingredient): ?>
<!--                                        <option value="--><?php //= $ingredient->ID_ingredient?><!--">--><?php //= $ingredient->nom ?><!--</option>-->
                                        <option value="<?= $ingredient->ID_ingredient?>"><?= $ingredient->nom ?></option>
                                    <?php endforeach;?>
                                </select>
                              <?php endif;?>

                            <input type="text" class = "ajout-input" id = "qte" name="Quantité" placeholder="Quantité" value = "">
                            <input class = "ajout-input" type="text" id = "unite" name="Unite" placeholder="unite" value = "">
                            <input type="hidden" name="idRecette" value="<?= $recette->ID_recette ?>">

                            <div class="btn_class">
                                <button type="submit" class = "btn" id="" >Ajouter un ingrédient</button>
                                <a href="#" type="button" class = "btn" id="creerIngredient" >Creer un nouvel ingredient</a>
                                <button type="button" class = "btn annulerBtn" id="" >Annuler</button>
                            </div>

                         </div>
                    </form>


         <form  method="post" class = "cadre super_cadre" id = "ajout-ingredient-form" action="<?= $GLOBALS['PAGES'] ?>ajoutIngredientTraitement.php"  enctype="multipart/form-data">
            <div class="Title-Ajout">Ajouter un nouveau ingredient</div>
            <div class="ingredients-inputs">
                <input class = "ajout-input" type="text" id = "nom-ingredient" name="nomIngredient" placeholder="Entrer le nom de l'ingredient" value = "" required>
                <label for="photo-ingredient" class="subTitle"> Photo de l'ingredient</label>
                <input type="file" class="ajout-input" id="photo_ingredient" name="photo_ingredient" required>
            </div>

            <div class="btn_class">
                <button type="submit" id="ajouter-ingredient-button" class = "btn ValiderBtn" >Ajouter</button>
                <button type="button" id="creerIngredient" class = "btn annulerBtn"  >Annuler</button>
            </div>
        </form>

        <form method="post" class="cadre super_cadre" id = "modifDescription" action="<?= $GLOBALS['PAGES'] ?>modifDescription.php" >
            <span>Modifier description</span>
            <input type="hidden" name="idRecette" value="<?= $recette->ID_recette ?>">
            <textarea class="ajout-input" id="description-recette" name="description" placeholder="" required><?= $recette->description ?></textarea>
            <div class="btn_class">
                <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>
                <button type="button" class = "btn annulerBtn" id="" >Annuler</button>
            </div>

        </form>

            </div>

<!--                --><?php
//                $tab = array();
//                foreach ($Listescategorie as $lcategories){
//                    if($lcategories->ID_recette == $Id_Recette){
//                        foreach ($Listescategorie as $lcategories1){
//                            if($lcategories1->ID_categorie == $lcategories->ID_categorie){
//                                foreach ($ListesRecettes as $rec){
//                                    if($lcategories1->ID_recette == $rec->ID_recette  && $rec->ID_recette != $Id_Recette){
//                                        $tab[] = $rec->titre;
//                                    }
//                                }
//                            }
//                        }
//                    }
//                }
//                $tab = array_unique($tab);?>

            <span  class="info">Si vous avez aimé cette recette, vous devriez essayer ces autres recettes de la même catégorie.
                Elles ont toutes des saveurs uniques qui feront saliver vos papilles gustatives !</span>


            <div class="cadre">
                <div class="items-cadre">
                         <!-- affichage de Quelques recette qui appartiennet au meme categorie -->

                  <?php foreach  ($recetteMemeCategories as $rec){
                      if($rec->ID_recette != $recette->ID_recette)
                          $this->formulaire->RecetteForm($rec);
                  }

                    ?>
                </div>
            </div>































































<!--        <!-- affichage de ma recette -->-->
<!--        <script src = "--><?php //= $GLOBALS['JS_DIR']?><!--modifier.js"></script>-->
<!---->
<!--        <div class="recette-cadre" id="ID_recette">-->
<!--            --><?php //foreach ($ListesRecettes as $rec ): ?>
<!--                --><?php //if($rec->ID_recette == $Id_Recette): ?>
<!--                    <form method="post" class="cadre super_cadre" id="modifierNom"  action="--><?php //= $GLOBALS['DOCUMENT_DIR'] ?><!--pages/modifierRecette.php">-->
<!--                        <span>Modifier le nom</span>-->
<!--                        <input class = "ajout-input" type="text" id = "" name="nom_recette" placeholder="" value="--><?php //= $rec->titre ?><!--">-->
<!---->
<!--                        <div class="btn_class">-->
<!--                            <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>-->
<!--                            <button type="button" class = "btn annulerBtn" id="" >Annuler</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!---->
<!--                    <div class="recette-name"> --><?php //= $rec->titre ?>
<!--                        --><?php //if(isset($_SESSION['username'])) : ?>
<!--                            <img class = "pen" id="pen_name" src="--><?php //= $GLOBALS['IMG_DIR']."src/pen.svg"?><!--"  alt="pen icon"/>-->
<!--                        --><?php //endif;?>
<!--                    </div> <!--Nom de la recette-->-->
<!---->
<!--                    <!-- photo de la recette -->-->
<!--                    <div class="position-relative">-->
<!--                        <img class = "recette-picture " src="--><?php //= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?><!--" alt="photo recette" />-->
<!--                        --><?php //if(isset($_SESSION['username'])) : ?>
<!--                            <img class = "pen" id="penImages" src="--><?php //= $GLOBALS['IMG_DIR']."src/pen.svg"?><!--"  alt="pen icon"/>-->
<!--                        --><?php //endif;?>
<!--                    </div>-->
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
<!--                    <div class="title"> Ingredients <button type="button" id="ajouter_Ingredient_message">+ Ajouter un ingredient</button></div>-->
<!--                        <div class="ingredients">-->
<!--                            --><?php //foreach ($ListesIngredients as $ListIngr): ?>
<!--                                --><?php //if($ListIngr->ID_recette == $rec->ID_recette ): ?>
<!--                                    --><?php //foreach  ($Ingredients as $ing): ?>
<!--                                        --><?php //if($ing->ID_ingredient == $ListIngr->ID_ingredient ): ?>
<!--                                            <li class = "ingredient position-relative">-->
<!--                                                <img class = "ingredient-picture" src="--><?php //= $GLOBALS['IMG_DIR']."ingredients/".$ing->photo ?><!--" alt="photos ingredients" />-->
<!--                                                <div class="ingredient-info">--><?php //= $ListIngr->Qte ?><!-- </div>-->
<!--                                                <div class="ingredient-info">--><?php //= $ListIngr->mesure ?><!--</div>-->
<!--                                                <div class="ingredient-info">--><?php //= $ing->nom ?><!--</div>-->
<!---->
<!--                                                --><?php //if(isset($_SESSION['username'])) : ?>
<!--                                                    <a href="#ID_recette" class="ingredientsModifier">-->
<!--                                                        <img class = "pen" src="--><?php //= $GLOBALS['IMG_DIR']."src/pen.svg"?><!--" alt="pen icon"/>-->
<!--                                                    </a>-->
<!--                                                --><?php //endif;?>
<!---->
<!--                                            </li>-->
<!--                                                   <!-- Pour modifier un ingredient -->-->
<!--                                            <form method="post" class="cadre super_cadre" id="--><?php //= $ing->nom?><!--" enctype="multipart/form-data" action="--><?php //= $GLOBALS['PAGES'] ?><!--modifierListesIngredient.php">-->
<!--                                                <span>Modifier l'ingredients</span>-->
<!--    <!--                                            <img class = "ingredient-picture" src="-->--><?php ////= $GLOBALS['IMG_DIR']."ingredients/".$ing->photo ?><!--<!--" alt="" />-->-->
<!---->
<!--                                                <div id="ingredients">-->
<!--                                                    <input type="text" class = "ajout-input" id = "qte" name="Quantité" placeholder="Quantité"value ="--><?php //= $ListIngr->Qte ?><!--" >-->
<!--                                                    <input class = "ajout-input" type="text" id = "unite" name="Unite" placeholder="unite" value ="--><?php //= $ListIngr->mesure ?><!--">-->
<!--                                                    <input type="hidden" name="idRecette" value="--><?php //= $Id_Recette ?><!--">-->
<!--                                                     <input type="hidden" name="idIngredient" value="--><?php //= $ing->ID_ingredient ?><!--">-->
<!--                                                </div>-->
<!--                                                <div class="btn_class">-->
<!--                                                    <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>-->
<!--                                                    <button type="button" class = "btn annulerBtn" id="" >Annuler</button>-->
<!--                                                </div>-->
<!--                                            </form>-->
<!---->
<!---->
<!--                                                         <!--            Pour un nouvel ingredient-->-->
<!--                                        --><?php //endif;?>
<!--                                    --><?php //endforeach;?>
<!--                                --><?php //endif;?>
<!--                            --><?php //endforeach;?>
<!--                        </div>-->
<!---->
<!--                        <div class="description">-->
<!--                            --><?php //= $rec->description ?><!-- <a href="#ID_recette"> <img class = "pen" id="pen_description" src="--><?php //= $GLOBALS['IMG_DIR']."src/pen.svg"?><!--"  alt="pen icon"/></a>-->
<!--                        </div>-->
<!--                    --><?php //endif;?>
<!---->
<!--                --><?php //endforeach;?>
<!--                    <form  method="post" id = "formulaire-ajouter-ingredient" class = "cadre super_cadre"  action=" " >-->
<!--                         <div id="ingredients">-->
<!--                            <div class="subTitle">Ingrédients</div>-->
<!---->
<!--                            --><?php //if(isset($_SESSION['Ingredients'])): ?>
<!--                                <select id="choixIngredients" class="ajout-input" name="choixIngredients">-->
<!--                                    --><?php //foreach  ($_SESSION['Ingredients'] as $ingredient): ?>
<!--            <!--                            <option value="-->--><?php ////= $ingredient->ID_ingredient?><!--<!--">-->--><?php ////= $ingredient->nom ?><!--<!--</option>-->-->
<!--                                        <option value="--><?php //= $ingredient->ID_ingredient?><!--">--><?php //= $ingredient->nom ?><!--</option>-->
<!--                                    --><?php //endforeach;?>
<!--                                </select>-->
<!--                              --><?php //endif;?>
<!---->
<!--                            <input type="text" class = "ajout-input" id = "qte" name="Quantité" placeholder="Quantité" value = "">-->
<!--                            <input class = "ajout-input" type="text" id = "unite" name="Unite" placeholder="unite" value = "">-->
<!--                            <input type="hidden" name="idRecette" value="--><?php //= $Id_Recette ?><!--">-->
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
<!--            <input type="hidden" name="idRecette" value="--><?php //= $Id_Recette ?><!--">-->
<!--            <textarea class="ajout-input" id="description-recette" name="description" placeholder="" required>--><?php //= $rec->description ?><!--</textarea>-->
<!--            <div class="btn_class">-->
<!--                <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>-->
<!--                <button type="button" class = "btn annulerBtn" id="" >Annuler</button>-->
<!--            </div>-->
<!---->
<!--        </form>-->
<!---->
<!--            </div>-->
<!---->
<!--                --><?php
//                $tab = array();
//                foreach ($Listescategorie as $lcategories){
//                    if($lcategories->ID_recette == $Id_Recette){
//                        foreach ($Listescategorie as $lcategories1){
//                            if($lcategories1->ID_categorie == $lcategories->ID_categorie){
//                                foreach ($ListesRecettes as $rec){
//                                    if($lcategories1->ID_recette == $rec->ID_recette  && $rec->ID_recette != $Id_Recette){
//                                        $tab[] = $rec->titre;
//                                    }
//                                }
//                            }
//                        }
//                    }
//                }
//                $tab = array_unique($tab);?>
<!--            <span  class="info">Si vous avez aimé cette recette, vous devriez essayer ces autres recettes de la même catégorie.-->
<!--                Elles ont toutes des saveurs uniques qui feront saliver vos papilles gustatives !</span>-->
<!---->
<!---->
<!--            <div class="cadre">-->
<!--                <div class="items-cadre">-->
<!---->
<!--                  --><?php //foreach  ($tab as $t){?>
<!--                         <!-- affichage de Quelques recette qui appartiennet au meme categorie -->-->
<!--                        --><?php //foreach ($ListesRecettes as $rec){
//                            if($rec->titre == $t){
//                                 $this->formulaire->RecetteForm($rec);
//                           }
//                        }
//                  }
//                    ?>
<!--                </div>-->
<!--            </div>-->
<?php
    }

    public function Afficheingredient($ingredient):void{?>
            <!-- affichage de ma recette -->
        <script src = "<?= $GLOBALS['JS_DIR']?>modifier.js"></script>

        <div class="recette-cadre" id="ID_recette">
                    <form method="post" class="cadre super_cadre" id="modifierNom"  action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/modifIngredient.php">
                        <span>Modifier le nom</span>
                        <input class = "ajout-input" type="text" id = "" name="nom_ing" placeholder="" value="<?= $ingredient->nom ?>">
                          <input type="hidden" name="idIngredient" value="<?= $ingredient->ID_ingredient ?>">
                        <div class="btn_class">
                            <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>
                            <button type="button" class = "btn annulerBtn" id="" >Annuler</button>
                        </div>
                    </form>

                    <div class="recette-name"> <?= $ingredient->nom ?>

                            <img class = "pen" id="pen_name" src="<?= $GLOBALS['IMG_DIR']."src/pen.svg"?>"  alt="pen icon"/>

                    </div>

                    <div class="position-relative">
                        <img class = "recette-picture " src="<?= $GLOBALS['IMG_DIR']."ingredients/".$ingredient->photo ?>" alt="photo ing" />
                        <?php if(isset($_SESSION['username'])) : ?>
                            <img class = "pen" id="penImages" src="<?= $GLOBALS['IMG_DIR']."src/pen.svg"?>"  alt="pen icon"/>
                        <?php endif;?>
                    </div>

                    <form method="post" class="cadre super_cadre" id="modifierImage" enctype="multipart/form-data" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/modifIngredient.php">
                        <span>Modifier l'image</span>
                        <input class = "ajout-input" type="file" id = "new-photo-ing" name="new-photo-ing" placeholder="">
                        <div class="btn_class">
                            <button type="submit" class = "btn modifierBtn" id="" >Modifier</button>
                            <button type="button" class = "btn annulerBtn" id="" >Annuler</button>
                        </div>
                          <input type="hidden" name="idIngredient" value="<?= $ingredient->ID_ingredient ?>">
                    </form>
                    <?php
    }
    public function AfficherListesRecettes($categories, $listescategories,$recettes):void{
           foreach ($categories as $t) :?>
            <div class="categorieRecettes centrer"><!-- genere un block de categorie -->
                <h1 class="title-Recette-index"> <?= $t->nom ?> </h1>
                <div class="liste-Recette-index centrer">
                    <?php  foreach ($listescategories as $listes){
                         if($listes->ID_categorie == $t->ID_categorie){?>
                            <!-- ensemble de recette qui appartiennent a cette categorie -->
                               <?php foreach ($recettes as $rec){
                                    if($rec->ID_recette == $listes->ID_recette){
                                       $this->formulaire->RecetteForm($rec);
                                    }
                               }
                         }
                    }
                    ?>
                </div>
            </div>
        <?php endforeach;
    }


    public function AfficherListesRecettesMin($recettes):void{ ?>
        <div class="cadre">
            <div class="items-cadre">
                <?php foreach ($recettes as $rec){
                    $this->formulaire->RecetteForm($rec);
                } ?>
            </div>
        </div>
   <?php }
    public function AfficherParCategorie($Id_categorie,$Listescategorie,$categories,$ListesRecettes):void{?>
            <div class="cadre">
                 <?php  foreach  ($categories as $categorie): ?>
                   <?php if($categorie->ID_categorie == $Id_categorie): ?>
                        <div class="title-cadre"><?= $categorie->nom ?></div> <!-- Titre de la categorie-->
                    <?php endif;?>
                 <?php endforeach;?>
                       <div class="items-cadre">
                             <?php
                             foreach  ($Listescategorie as $lcategories){
                                if($lcategories->ID_categorie == $Id_categorie){
                                    foreach ($ListesRecettes as $rec){
                                        if($rec->ID_recette == $lcategories->ID_recette){
                                            $this->formulaire->RecetteForm($rec);
                                        }
                                    }
                                }
                             }
                             ?>
                    </div>
                <?php
        }
    public function AfficherListesCategories($categories,$gdb):void{?>
        <div class="cadre"><!-- genere un block de categorie -->
            <h1 class="title-cadre"> Categories </h1>
            <div class="items-cadre">
                <?php foreach ($categories as $t) :?>
                    <?php $image = $gdb->rechercheCategorie($t->ID_categorie);
                    if($image != null ):
                        $image = $image[0]->photo; ?>
                           <?php $this->formulaire->CategorieForm($image,$t);?>

                    <?php endif; ?>
                <?php endforeach;?>
            </div>
        </div>
        <?php
    }
    public function AfficherListesRecherches($recettesRecherchee,$ListesRecettes): void { ?>
    <style>
    #main-content{
        display: none;
    }
</style>
    <div class="search-results">
     <div class="items-cadre">
     <?php
        foreach ($recettesRecherchee as $rec){
            foreach ($ListesRecettes as $rec1){
                if($rec->titre == $rec1->titre){
                     $this->formulaire->RecetteForm($rec1);
                }
            }
        } ?>
         </div>
         </div>
        <?php
    }

     public function AfficherIngredientRecherches($listesing,$ingredients): void { ?>
        <style>
        #main-content{
            display: none;
        }
    </style>
        <div class="search-results">
         <div class="items-cadre">
         <?php
            foreach ($listesing as $rec){
                foreach ($ingredients as $rec1){
                    if($rec->nom == $rec1->nom){
                         $this->formulaire->IngredientForm($rec1);
                    }
                }
            } ?>
             </div>
             </div>
            <?php
    }
     public function AfficheDonneesTest( $recette , $listeIng, $listecategorie): void{
         echo "Nom de la recette est " . $recette['titre'] . " et la photo est " . $recette['photo'] . "<br>";
         foreach ($listeIng as $lg)
             echo "Nom : " . $lg['nom'] . " Photo : " . $lg['photo'] . " Mesure : " . $lg['mesure'] . " Quantité :" . $lg['Qte'] . "<br>"; // quantite
         foreach ($listecategorie as $lscategorie) echo $lscategorie['nom'] . " ";
    }
    public function AfficherErreur(): void{
        ?>
        <style>
            .erreur{
                color: red;
                text-align: center;
                font-size: 0.8cm;
            }
        </style>
        <?php
        if(!isset($_SESSION['recette']) ){
            ?> <div class="erreur"> <?php echo "Veuiller remplir le formulaire de la recette!!"; ?></div><?php
        }
        if(!isset($_SESSION['listeIngredients'])){?>
            <div class="erreur"> <?php echo "Veuiller remplir le formulaire des ingrédients!!"; ?></div><?php
        }
        if(!isset($_SESSION['nom-categorie'])) {
            ?> <div class="erreur"> <?php echo "Veuiller remplir le formulaire des categories!!"; ?></div><?php
        }
    }

}