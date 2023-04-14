<?php

namespace recette;
class AjoutFormulaire{
    public function generateAjoutForm(): void{?>
        <div class="ajout-recette">
            <form method="post" class="" id="ajout-recette-form"  enctype="multipart/form-data" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutRecetteTraitement.php">
<!--                Ajout des informations de la recette-->
                <div class="TitleAjoutRecette">Ajouter une recette</div>
                <?php
                $nom_recette = "";
                if(isset($_SESSION['recette']))
//                    $nom_recette = $_SESSION['recette'])->nom;
                ?>

                <input class = "ajout-input" type="text" id = "nom" name="nom" placeholder="Entrer le nom de la recette" value = "<?= $nom_recette ?>" <!-- nom de la recette -->
                <label for="le_fichier" class="form-label">Nom de l'image avec l'extension :</label> <!-- Image de la recette -->
                <input type="file" class="file" id="photo_recette" name="photo_recette">

<!--                liste des ingredients de la recette-->
                <div id="ingredients">
                    <div class="titleIngredient">Ingrédients</div>
                    <div id="listeIngredient">
                        <div class="ingredientClass">
                            <div>banana</div>
                            <div>15</div>
                            <div></div>
                        </div>

                        <div class="ingredientClass">
                            <div>sucre</div>
                            <div>2</div>
                            <div>grammes</div>
                        </div>

                        <div class="ingredientClass">
                            <div>sel</div>
                            <div>3</div>
                            <div>grammes</div>
                        </div>
                    </div>
                </div>
<!--                liste des tags de la recette-->
                <div id="tags">
                    <div class="titleTag">Tags</div>
                    <div class="divTags">
                        <div id="listeTags">
                            <div class="tagClass">dessert</div>
                            <div class="tagClass">chocolat</div>
                        </div>

                    </div>
                </div>
            </form>


            <div class="ajout-tag-ingredient">
    <!--            Pour gerer l'ajout des ingredients-->
                <form  method="post" id = "ajout-ingredient-form" action=""  enctype="multipart/form-data">

                    <input class = "ajout-input" type="text" id = "nom-ingredient" name="nom-ingredient" placeholder="Entrer le nom de l'ingredient" value = "">
                    <input class = "ajout-input" type="text" id = "unite" name="unite" placeholder="unite" value = "">
                    <input type="number" id = "qte" name="quantite" placeholder="Quantité" value = "" min = 0>
                    <div class="photo-in">
                        <label for="photo-ingredient"> Photo de l'ingredient</label>
                        <input type="file" class="file" id="photo_ingredient" name="photo_ingredient">
                    </div>
                    <button type="submit" id="ajouter-ingredient-button" class = "btn" >Ajouter un ingrédient</button>
                </form>

    <!--            Pour gerer l'ajout des tags-->
                <form  method="post" id = "ajout-tag-form" action=""  enctype="multipart/form-data">
                    <input class = "ajout-input" type="text" id = "nom-tag" name="nom-tag" placeholder="Entrer un tag" value = "">
                    <button type="submit" id="ajouter-tag-button" class = "btn" >Ajouter un tag</button>
                </form>
            </div>



<!--            bouton pour l'ajout de la recette-->
            <button type="button" id = "ajout-recette" class="btn" value="Ajouter la recette">Ajouter la recette</button>

            <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>
            <script>
                // Script pour gerer l'ajout des tags et des recettes
                // let btIngredients= document.getElementById("ajouter-ingredient-button");
                // btIngredients.addEventListener("click", function(event){
                //     // mets les codes php ici pour gerer l'ajout d'un ingredient
                //
                //     let ingredient = document.getElementById("ajout-ingredient-form");
                //     let val = ingredient.querySelectorAll('.ajout-input');
                //     let qt = document.getElementById("qte");
                //     let imgage_ingredient = document.getElementById("photo_ingredient") ;
                //
                //     let name_Ingredient = val[0].value;
                //     let unite_Ingredient = val[1].value;
                //     let quantite_Ingredient = qt.value;

                    //Faire le upload ici

                    // let image_ingredient = imgage_ingredient.files[0].name;


                    <?php //echo 'alert("Ceci est une fenêtre ajout ingredients");'; ?>
                })

                // let btTags= document.getElementById("ajouter-tag-button");
                // btTags.addEventListener("click", function(event){
                //     // mets les codes php ici pour gerer l'ajout des tags
                //     let tag = document.getElementById("ajout-tag-form");
                //     let val = tag.querySelectorAll('.ajout-input');
                //
                //     let tag_name = val[0].value; // nom du tag

                    <?php //echo 'alert("Ceci est une fenêtre Ajout tags !");'; ?>
                })
            </script>
        </div>
        <?php
    }


}