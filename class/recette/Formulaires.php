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
    public function CategorieForm($image,$categorie):void{?>
        <form method="post" class="item-cadre" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/afficheCategorie.php">
            <figure class="item-infos">
                <img class = "item-picture" src="<?= $GLOBALS['IMG_DIR']."recettes/".$image ?>" alt="" />
                <figcaption class="item-name">  <?= $categorie->nom ?> </figcaption>
            </figure>
            <input type="hidden" id="<?= $categorie->ID_categorie?>" value="<?= $categorie->ID_categorie?>" name="Id_categorie">
        </form>
        <?php
    }

    public function AjoutForm():void{?>
        <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>

        <!--        <div class="ajout-recette">-->
        <form method="post" class="cadre" id="ajout-recette-form"  enctype="multipart/form-data" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutRecetteTraitement.php">
            <!--                Ajout des informations de la recette-->
            <div class="Title-Ajout">Ajouter une recette</div>

            <div id="recette">
                <input class = "ajout-input" type="text" id = "nom" name="nom" placeholder="Entrer le nom de la recette" required> <!-- nom de la recette -->
                <label for="le_fichier" class="subTitle">Photo de l'ingredient</label> <!-- Image de la recette -->
                <input type="file" class="ajout-input" id="photo_recette" name="photo_recette" required>
            </div>

            <div id="categories">
                <div class="subTitle">Categories</div>
                <div id="listeCategorie">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input check" name="dessert" id="" value="">
                        <label class="form-check-label" for="dessert">Dessert</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input check" name="sucre" id="" value="">
                        <label class="form-check-label" for="mailing">Sucre</label>
                    </div>
                </div>
<!--                <a type="button" href = "#ajout-categorie-form" class = "btn" >Ajouter un nouveau categorie</a>-->

            </div>

            <!--                liste des ingredients de la recette-->
            <div id="ingredients">
                <div class="subTitle">Ingrédients</div>
                <div id="listeIngredient"></div>

<!--                <input class = "ajout-input" type="text" id = "nom-ingredient" name="" placeholder="Entrer le nom de l'ingredient" value = "" onkeyup="rehercher()">-->

                <select id="choixIngredients" class="ajout-input" name="">
                    <!--     generes moi ici les id dans value et le nom des ingredients de la base de donnees-->
                    <option value="1">lait de vache</option>
                    <option value="2">salt</option>
                    <option value="3">sugar</option>
                </select>

                <input class = "ajout-input" type="text" id = "unite" name="" placeholder="unite" value = "">
                <input type="number" class = "ajout-input" id = "qte" name="" placeholder="Quantité" value = "" min = 0>

<!--                <div class="btn-choix">-->
                    <button type="button" class = "btn" id="ajout-ingre" >Ajouter un ingrédient</button>
<!--                    <a type="button" href = "#ajout-ingredient-form" class = "btn" >Ajouter un nouveau ingrédient</a>-->

<!--                </div>-->
            </div>


            <!--                liste des categories de la recette             -->
            <div id="tag">
                <div class="subTitle">Tag</div>
                <input class = "ajout-input" type="text" id = "nom-tag" name="" placeholder="Ajout les tags" value = "">
            </div>
            <button type="submit" id = "ajout-recette" class="btn" value="Ajouter la recette">Ajouter la recette</button>
        </form>



        <!--            Pour ajouter les ingredients-->
        <form  method="post" class = "cadre" id = "ajout-ingredient-form" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutIngredientTraitement.php"  enctype="multipart/form-data">
            <div class="Title-Ajout">Ajouter un nouveau ingredient</div>
            <div class="ingredients-inputs">
                <input class = "ajout-input" type="text" id = "nom-ingredient" name="nomIngredient" placeholder="Entrer le nom de l'ingredient" value = "" required>
                <label for="photo-ingredient" class="subTitle"> Photo de l'ingredient</label>
                <input type="file" class="ajout-input" id="photo_ingredient" name="photo_ingredient" required>
            </div>
            <button type="submit" id="ajouter-ingredient-button" class = "btn" >Ajouter</button>
        </form>

        <!--            Pour ajouter les categories-->
        <form  method="post" class = "cadre" id = "ajout-categorie-form" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutCategorieTraitement.php" >
            <div class="Title-Ajout">Ajouter une nouvelle categorie</div>
            <div class="categorie-inputs">
                <input class = "ajout-input" type="text" id = "nom-categorie" name="nomCategorie" placeholder="Entrer la categorie" value = "" required>
            </div>
            <button type="submit" id="ajouter-ingredient-button" class = "btn" >Ajouter</button>
        </form>


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