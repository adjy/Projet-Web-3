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
                <a id = "ID-delete-btn" class = "btn-supp btn" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>" onclick="return suppression();" >X</a>
            <?php } ?>
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
                    </><?php
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

    public function RechecherForm():void{?>
        <form id = "searchID-form" class = "form-search centrer" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/rechercheTraitement.php" method="POST">
            <input class = "input-search" type="text" id="searchID" name="fname" placeholder="dessert / chocolat / fruit " required>
            <button class= "btn search-btn" type="submit" value="Search">Search</button>
        </form>
        <?php
    }

}