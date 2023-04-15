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
                    $nom_recette = $_SESSION['recette']['titre'];
                ?>

                <input class = "ajout-input" type="text" id = "nom" name="nom" placeholder="Entrer le nom de la recette" value = "<?= $nom_recette ?>" <!-- nom de la recette -->
                <label for="le_fichier" class="form-label">Nom de l'image avec l'extension :</label> <!-- Image de la recette -->
                <input type="file" class="file" id="photo_recette" name="photo_recette">

                <!--                liste des ingredients de la recette-->

                <div id="ingredients">
                    <div class="titleIngredient">Ingrédients</div>
                    <div id="listeIngredient">
                        <?php
                        if( isset( $_SESSION['listeIngredients'])) {
                            $ingredients =  $_SESSION['listeIngredients'];
                            foreach ( $ingredients  as $lists): ?>
                                <div class="ingredientClass">
                                    <div> <?= $lists['nom'] ?></div>
                                    <div><?= $lists['Qte'] ?></div>
                                    <div><?= $lists['mesure'] ?></div>
                                </div>
                            <?php endforeach;
                        }

                        ?>
                    </div>
                </div>


                <!--                liste des tags de la recette             -->

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
                <form  method="post" id = "ajout-ingredient-form" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutIngredientTraitement.php"  enctype="multipart/form-data">

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
                <form  method="post" id = "ajout-tag-form" action="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutTagTraitement.php"  enctype="multipart/form-data">
                    <input class = "ajout-input" type="text" id = "nom-tag" name="nom-tag" placeholder="Entrer un tag" value = "">
                    <button type="submit" id="ajouter-tag-button" class = "btn" >Ajouter un tag</button>
                </form>
            </div>



            <!--            bouton pour l'ajout de la recette-->
            <button type="button" id = "ajout-recette" class="btn" value="Ajouter la recette">Ajouter la recette</button>

            <script>
                let formRecette = document.getElementById("ajout-recette-form");
                let formIngredients = document.getElementById("ajout-ingredient-form");
                let buttonIngredients = document.getElementById("ajouter-ingredient-button");
                let nom = document.getElementById("non");
                let input = formIngredients.querySelectorAll(".hidden");

                buttonIngredients.addEventListener('click', function (e){
                    alert("sss")
                    let nodeNom = document.createElement("input"); // creation d'un input
                    nodeNom.name = "nom"; // ajoute ce nom dans la liste de name nom-ingredient
                    nodeNom.value = nom.value; // donne comme valeur la valeur de nom
                    // nodeNom.type = "hidden"; // met le input a hidden pour ne pas l'afficher
                    formIngredients.append(nodeNom);
                    console.log(formIngredients);

                })
                // console.log(formRecette);
            </script>
            <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>

        </div>
        <?php
    }


}