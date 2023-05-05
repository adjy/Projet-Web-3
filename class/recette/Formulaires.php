<?php
namespace recette;

class Formulaires{

    public function RecetteForm($recette):void{?>
        <form method="post" class="item-cadre" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/afficheRecette.php">
            <figure class="item-infos">
                <img class = "item-picture"  src="<?= $GLOBALS['IMG_DIR']."recettes/".$recette->photo ?>" alt="Dinosaur" />
                <figcaption class="item-name">  <?= $recette->titre ?>  </figcaption>
            </figure>
            <input type="hidden" name="Id_recette" id="<?= $recette->ID_recette ?>" value="<?= $recette->ID_recette ?>" >
            <?php  if(isset($_SESSION['username'])){?>
                <a id = "ID-delete-btn" class = "btn-supp btn"  >X</a>
            <?php } ?>
        </form>
        <form method="post" class="supp" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/supptraitement.php">
            <input type="hidden" name="Id_recette" id="<?= $recette->ID_recette ?>" value="<?= $recette->ID_recette ?>" >

        </form>

        <?php
    }
    public function CategorieForm($image,$tag):void{?>
        <form method="post" class="item-cadre" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/afficheCategorie.php">
            <figure class="item-infos">
                <img class = "item-picture" src="<?= $GLOBALS['IMG_DIR']."recettes/".$image ?>" alt="" />
                <figcaption class="item-name">  <?= $tag->nom ?> </figcaption>
            </figure>
            <input type="hidden" id="<?= $tag->ID_tag?>" value="<?= $tag->ID_tag?>" name="Id_Tag">
        </form>
        <?php
    }

    public function AjoutForm():void{?>
<!--        <!--                Ajout des informations de la recette-->-->
<!--        <form method="post" class="cadre" id="ajout-recette-form"  enctype="multipart/form-data" action="--><?php //= $GLOBALS['DOCUMENT_DIR'] ?><!--pages/ajoutRecetteTraitement.php">-->
<!--            <div class="TitleAjout">Ajouter une recette</div>-->
<!--            --><?php
//            if(isset( $_SESSION['recette'] )){
//                ?>
<!--                <style>-->
<!--                    #photo_recette,#photo-recette-subtitle{-->
<!--                        display: none;-->
<!--                    }-->
<!--                </style>--><?php
//            }
//            ?>
<!--            --><?php //if(isset($_SESSION['recette'])) :?>
<!--                <input class = "ajout-input" type="text" id = "nom" name="nom_recette" placeholder="Entrer le nom de la recette" value="--><?php //echo $_SESSION['recette']['titre'];?><!-- " required> <!-- nom de la recette -->-->
<!--            --><?php //else :?>
<!--                <input class = "ajout-input" type="text" id = "nom" name="nom_recette" placeholder="Entrer le nom de la recette" required> <!-- nom de la recette -->-->
<!--            --><?php //endif;?>
<!--            <label for="le_fichier" id="photo-recette-subtitle" class="subTitle">Photo de la recette</label> <!-- Image de la recette -->-->
<!--            <input type="file" class="ajout-input" id="photo_recette" name="photo_recette">-->
<!--            <button type="submit" id="ajouter-tag-button" class = "btn" >Insérer</button>-->
<!--        </form>-->
<!---->
<!--        <!--            Pour ajouter les ingredients-->-->
<!--        <form  method="post" class = "cadre" id = "ajout-ingredient-form" action="--><?php //= $GLOBALS['DOCUMENT_DIR'] ?><!--pages/ajoutIngredientTraitement.php"  enctype="multipart/form-data">-->
<!--            <div class="TitleAjout">Ajouter un ingredient</div>-->
<!--            <input class = "ajout-input" type="text" id = "nom-ingredient" name="nom-ingredient" placeholder="Entrer le nom de l'ingredient" value = "" required>-->
<!--            <input class = "ajout-input" class="ajout-input" type="text" id = "unite" name="unite" placeholder="unite" value = "" required>-->
<!--            <input type="number" class="ajout-input" id = "qte" name="quantite" placeholder="Quantité" value = "" required>-->
<!---->
<!--            <label for="photo-ingredient" class="subTitle"> Photo de l'ingredient</label>-->
<!--            <input type="file" class="ajout-input" id="photo_ingredient" name="photo_ingredient">-->
<!--            <button type="submit" id="ajouter-ingredient-button" class = "btn" >Insérer</button>-->
<!--        </form>-->
<!---->
<!--        <!--            Pour  ajouter les tags-->-->
<!--        <form  method="post" class="cadre" id = "ajout-tag-form" action="--><?php //= $GLOBALS['DOCUMENT_DIR'] ?><!--pages/ajoutTagTraitement.php"  >-->
<!--            <div class="TitleAjout">Ajouter un tag</div>-->
<!--            <div>Dessert,Salé,Chaud,Sucré...</div>-->
<!--            <input class = "ajout-input" type="text" id = "nom-tag" name="nom-tag" placeholder="Entrer un tag" value = "" required>-->
<!--            <button type="submit" id="ajouter-tag-button" class = "btn" >Insérer</button>-->
<!--        </form>-->
<!--        <a id = "ajout-recette" href="--><?php //= $GLOBALS['DOCUMENT_DIR'] ?><!--pages/ajoutRecetteBD.php" style="text-decoration: none; font-size: 0.8cm">Ajouter au recette</a>-->
<!--        <script src = "--><?php //= $GLOBALS['JS_DIR']?><!--admin.js"></script>-->








        <!--        <div class="ajout-recette">-->
        <form method="post" class="cadre" id="ajout-recette-form"  enctype="multipart/form-data" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutRecetteTraitement.php">
            <!--                Ajout des informations de la recette-->
            <div class="TitleAjout">Ajouter une recette</div>

            <input class = "ajout-input" type="text" id = "nom" name="nom" placeholder="Entrer le nom de la recette" required> <!-- nom de la recette -->
            <label for="le_fichier" class="subTitle">Photo de l'ingredient</label> <!-- Image de la recette -->
            <input type="file" class="ajout-input" id="photo_recette" name="photo_recette">

            <!--                liste des ingredients de la recette-->
            <div id="ingredients">
                <div class="subTitle">Ingrédients</div>
                <div id="listeIngredient"></div>

                <input class = "ajout-input" type="text" id = "nom-ingredient" name="" placeholder="Entrer le nom de l'ingredient" value = "" onkeyup="rehercher()">
                <div id="erreur-ingredient">Ingrédient introuvable. Veuillez l'ajouter dans la rubrique "ajout d'ingrédient"</div>

                <select id="choixIngredients" name="">
                    <!--     generes moi ici les id dans value et le nom des ingredients de la base de donnees-->
                    <option value="1">lait de vache</option>
                    <option value="2">salt</option>
                    <option value="3">sugar</option>
                </select>

                <input class = "ajout-input" type="text" id = "unite" name="" placeholder="unite" value = "">
                <input type="number" class = "ajout-input" id = "qte" name="" placeholder="Quantité" value = "" min = 0>

                <button type="button" class = "btn" id="ajout-ingre" >Ajouter un ingrédient</button>
            </div>


            <!--                liste des tags de la recette             -->
            <div id="tags">
                <div class="subTitle">Tags</div>

                <div id="listeTags">
                    <!--                            <div class="tagClass"></div>-->
                </div>

                <input class = "ajout-input" type="text" id = "nom-tag" name="" placeholder="Ajout un tag" value = "" onkeyup="rehercherTag()" required>
                <div id="erreur-tag">Tag introuvable. Veuillez l'ajouter dans la rubrique "ajout de tag"</div>
                <!--                    generes moi ici les id dans value et le nom des tags de la base de donnees-->
                <select id="choixTags" name="">
                    <option value="1">dessert</option>
                    <option value="2">chocolat</option>
                    <option value="3">sucre</option>
                </select>
                <button type="button" id="ajout-tag" class = "btn" >Ajouter un tag</button>
            </div>
            <button type="button" id = "ajout-recette" class="btn" value="Ajouter la recette">Ajouter la recette</button>
        </form>



        <!--            Pour ajouter les ingredients-->
        <form  method="post" class = "cadre" id = "ajout-ingredient-form" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutIngredientTraitement.php"  enctype="multipart/form-data">
            <div class="TitleAjout">Ajouter un ingredient</div>
            <input class = "ajout-input" type="text" id = "nom-ingredient" name="nom-ingredient" placeholder="Entrer le nom de l'ingredient" value = "" required>
            <label for="photo-ingredient" class="subTitle"> Photo de l'ingredient</label>
            <input type="file" class="ajout-input" id="photo_ingredient" name="photo_ingredient">
            <button type="submit" id="ajouter-ingredient-button" class = "btn" >Ajouter un ingrédient</button>
        </form>

        <!--            Pour  ajouter les tags-->
        <form  method="post" class="cadre" id = "ajout-tag-form" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutTagTraitement.php"  >
            <div class="TitleAjout">Ajouter un tag</div>
            <input class = "ajout-input" type="text" id = "nom-tag" name="nom-tag" placeholder="Entrer un tag" value = "" required>
            <button type="submit" id="ajouter-tag-button" class = "btn" >Ajouter un tag</button>
        </form>


        <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>

        <?php
    }

    public function RechecherForm():void{?>
        <form id = "searchID-form" class = "form-search centrer" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/rechercheTraitement.php" method="POST">
            <input class = "input-search" type="text" id="searchID" name="fname" placeholder="dessert / chocolat / fruit " required>
            <button class= "btn search-btn" type="submit" value="Search">Search</button>
        </form>
        <?php
    }

}