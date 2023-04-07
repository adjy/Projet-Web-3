<?php

namespace recette;
class AjoutFormulaire{
    public function generateAjoutForm(): void{?>
        <div class="ajout-recette">
            <form method="post" class="" id="ajout-recette-form"  enctype="multipart/form-data" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutRecetteTraitement.php">
                <div class="TitleAjoutRecette">Ajouter une recette</div>
                <input class = "ajout-input" type="text" id = "nom" name="nom" placeholder="Entrer le nom de la recette">
                <label for="le_fichier" class="form-label">Nom de l'image avec l'extension :</label>
                <input type="file" class="file" id="photo_recette" name="photo_recette">

                <div id="ingredients">
                    <div class="titleIngredient">Ingrédients</div>
                    <div id="listeIngredient"></div>

                </div>

                <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>
            </form>

            <form  method="post" id = "ajout-ingredient-form" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutIngredientTraitement.php"  enctype="multipart/form-data">

                <input class = "ajout-input" type="text" id = "nom-ingredient" name="nom-ingredient" placeholder="Entrer le nom de l'ingredient" value = "">
                <input class = "ajout-input" type="text" id = "unite" name="unite" placeholder="unite" value = "">
                <input type="number" id = "qte" name="quantite" placeholder="Quantité" value = "">
                <div class="photo-in">
                    <label for="photo-ingredient"> Photo de l'ingredient</label>
                    <input type="file" class="file" id="photo_ingredient" name="photo_ingredient">
                </div>

                <button type="submit" id="ajouter-ingredient" class = "btn" >Ajouter un ingrédient</button>

            </form>
            <button type="submit" id = "ajout-recette" class="btn" value="Ajouter la recette">Ajouter la recette</button>
        </div>
        <?php
    }


}