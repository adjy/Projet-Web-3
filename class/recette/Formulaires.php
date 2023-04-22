<?php
namespace recette;

class Formulaires{

    public function RecetteForm($recette):void{?>
        <form method="post" class="recette-index centrer" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/afficheRecette.php">
            <div class="photo-recette centrer">
                <img class = "image-recette-index"  src="<?= $GLOBALS['IMG_DIR']."recettes/".$recette->photo ?>" alt="Dinosaur" />
            </div>
            <div class="nom-recette-index centrer">
                <?= $recette->titre ?>
            </div>
            <input type="hidden" name="Id_recette" id="<?= $recette->ID_recette ?>" value="<?= $recette->ID_recette ?>" >
        </form>
        <?php
    }
    public function CategorieForm($image,$tag):void{?>
        <form method="post" class="recette-index centrer" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/afficheCategorie.php">
            <div class="photo-recette centrer">
                <img class = "image-recette-index" src="<?= $GLOBALS['IMG_DIR']."recettes/".$image ?>" alt="" />
            </div>
            <div class="nom-recette-index centrer">
                <?= $tag->nom ?>
            </div>
            <input type="hidden" id="<?= $tag->ID_tag?>" value="<?= $tag->ID_tag?>" name="Id_Tag">
        </form>
        <?php
    }

    public function AjoutForm():void{?>
            <!--                Ajout des informations de la recette-->
            <form method="post" class="cadre" id="ajout-recette-form"  enctype="multipart/form-data" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/ajoutRecetteTraitement.php">
                <div class="TitleAjout">Ajouter une recette</div>
                <?php
                if(isset( $_SESSION['recette'] )){
                    ?>
                    <style>
                        #photo_recette,#photo-recette-subtitle{
                            display: none;
                        }
                    </style><?php
                }
                ?>
                <?php if(isset($_SESSION['recette'])) :?>
                    <input class = "ajout-input" type="text" id = "nom" name="nom_recette" placeholder="Entrer le nom de la recette" value="<?php echo $_SESSION['recette']['titre'];?> " required> <!-- nom de la recette -->
                <?php else :?>
                    <input class = "ajout-input" type="text" id = "nom" name="nom_recette" placeholder="Entrer le nom de la recette" required> <!-- nom de la recette -->
                <?php endif;?>
                <label for="le_fichier" id="photo-recette-subtitle" class="subTitle">Photo de la recette</label> <!-- Image de la recette -->
                <input type="file" class="ajout-input" id="photo_recette" name="photo_recette">
                <button type="submit" id="ajouter-tag-button" class = "btn" >Insérer</button>
            </form>

            <!--            Pour ajouter les ingredients-->
            <form  method="post" class = "cadre" id = "ajout-ingredient-form" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/ajoutIngredientTraitement.php"  enctype="multipart/form-data">
                <div class="TitleAjout">Ajouter un ingredient</div>
                <input class = "ajout-input" type="text" id = "nom-ingredient" name="nom-ingredient" placeholder="Entrer le nom de l'ingredient" value = "" required>
                <input class = "ajout-input" class="ajout-input" type="text" id = "unite" name="unite" placeholder="unite" value = "" required>
                <input type="number" class="ajout-input" id = "qte" name="quantite" placeholder="Quantité" value = "" required>

                <label for="photo-ingredient" class="subTitle"> Photo de l'ingredient</label>
                <input type="file" class="ajout-input" id="photo_ingredient" name="photo_ingredient">
                <button type="submit" id="ajouter-ingredient-button" class = "btn" >Insérer</button>
            </form>

            <!--            Pour  ajouter les tags-->
            <form  method="post" class="cadre" id = "ajout-tag-form" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/ajoutTagTraitement.php"  >
                <div class="TitleAjout">Ajouter un tag</div>
                <div>Dessert,Salé,Chaud,Sucré...</div>
                <input class = "ajout-input" type="text" id = "nom-tag" name="nom-tag" placeholder="Entrer un tag" value = "" required>
                <button type="submit" id="ajouter-tag-button" class = "btn" >Insérer</button>
            </form>
            <a href="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/ajoutRecetteBD.php" style="text-decoration: none; font-size: 0.8cm">Ajouter au recette</a>
            <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>
            <?php
    }

}