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
        <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>

        <!--        <div class="ajout-recette">-->
        <form method="post" class="cadre" id="ajout-recette-form"  enctype="multipart/form-data" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutRecetteTraitement.php">
            <!--                Ajout des informations de la recette-->
            <div class="Title-Ajout">Ajouter une recette</div>

            <div id="recette">
                <input class = "ajout-input" type="text" id = "nom" name="nom" placeholder="Entrer le nom de la recette" required> <!-- nom de la recette -->
                <label for="le_fichier" class="subTitle">Photo de l'ingredient</label> <!-- Image de la recette -->
                <input type="file" class="ajout-input" id="photo_recette" name="photo_recette">
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

                <div class="btn-choix">
                    <button type="button" class = "btn" id="ajout-ingre" >Ajouter un ingrédient</button>
                    <a type="button" href = "#ajout-ingredient-form" class = "btn" >Ajouter un nouveau ingrédient</a>

                </div>
            </div>


            <!--                liste des tags de la recette             -->
            <div id="tags">
                <div class="subTitle">Tags</div>
                <input class = "ajout-input" type="text" id = "nom-tag" name="" placeholder="Ajout un tag" value = "">
            </div>
            <button type="submit" id = "ajout-recette" class="btn" value="Ajouter la recette">Ajouter la recette</button>
        </form>



        <!--            Pour ajouter les ingredients-->
        <form  method="post" class = "cadre" id = "ajout-ingredient-form" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutIngredientTraitement.php"  enctype="multipart/form-data">
            <div class="Title-Ajout">Ajouter un ingredient</div>
            <div class="ingredients-inputs">
                <input class = "ajout-input" type="text" id = "nom-ingredient" name="nomIngredient" placeholder="Entrer le nom de l'ingredient" value = "" required>
                <label for="photo-ingredient" class="subTitle"> Photo de l'ingredient</label>
                <input type="file" class="ajout-input" id="photo_ingredient" name="photo_ingredient">
            </div>
            <button type="submit" id="ajouter-ingredient-button" class = "btn" >Ajouter un nouveau ingrédient</button>
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