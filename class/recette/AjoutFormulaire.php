<?php

namespace recette;
class AjoutFormulaire{
    public function generateAjoutForm(): void{?>
        <div class="ajout-recette">
            <form method="post" class="" id="ajout-recette-form"  enctype="multipart/form-data" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutRecetteTraitement.php">
<!--                Ajout des informations de la recette-->
                <div class="TitleAjoutRecette">Ajouter une recette</div>
                <input class = "ajout-input" type="text" id = "nom" name="nom" placeholder="Entrer le nom de la recette"> <!-- nom de la recette -->
                <label for="le_fichier" class="form-label">Nom de l'image avec l'extension :</label> <!-- Image de la recette -->
                <input type="file" class="file" id="photo_recette" name="photo_recette">

<!--                liste des ingredients de la recette-->
                <div id="ingredients">
                    <div class="titleIngredient">Ingrédients</div>
                    <div id="listeIngredient"></div>
                </div>
<!--                liste des tags de la recette-->
                <div id="tags">
                    <div class="titleTags">Tags</div>
                    <div id="listeTags"></div>
                </div>
            </form>

<!--            Pour gerer l'ajout des ingredients-->
            <form  method="post" id = "ajout-ingredient-form" action=""  enctype="multipart/form-data">

                <input class = "ajout-input" type="text" id = "nom-ingredient" name="nom-ingredient" placeholder="Entrer le nom de l'ingredient" value = "">
                <input class = "ajout-input" type="text" id = "unite" name="unite" placeholder="unite" value = "">
                <input type="number" id = "qte" name="quantite" placeholder="Quantité" value = "">
                <div class="photo-in">
                    <label for="photo-ingredient"> Photo de l'ingredient</label>
                    <input type="file" class="file" id="photo_ingredient" name="photo_ingredient">
                </div>
                <button type="button" id="ajouter-ingredient-button" class = "btn" >Ajouter un ingrédient</button>
            </form>

<!--            Pour gerer l'ajout des tags-->
            <form  method="post" id = "ajout-tag-form" action=""  enctype="multipart/form-data">
                <input class = "ajout-input" type="text" id = "nom-tag" name="nom-tag" placeholder="Entrer un tag" value = "">
                <button type="button" id="ajouter-tag-button" class = "btn" >Ajouter un tag</button>
            </form>

<!--            bouton pour l'ajout de la recette-->
            <button type="button" id = "ajout-recette" class="btn" value="Ajouter la recette">Ajouter la recette</button>

            <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>
            <script>
                // Script pour gerer l'ajout des tags et des recettes
                let btIngredients= document.getElementById("ajouter-ingredient-button");
                btIngredients.addEventListener("click", function(event){
                    // mets les codes php ici pour gerer l'ajout d'un ingredient
                    <?php echo 'alert("Ceci est une fenêtre ajout ingredients");'; ?>
                })

                let btTags= document.getElementById("ajouter-tag-button");
                btTags.addEventListener("click", function(event){
                    // mets les codes php ici pour gerer l'ajout des tags
                    <?php echo 'alert("Ceci est une fenêtre Ajout tags !");'; ?>
                })
            </script>
        </div>
        <?php
    }


}