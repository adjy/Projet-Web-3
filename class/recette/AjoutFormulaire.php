<?php

namespace recette;
class AjoutFormulaire{
    public function generateAjoutForm(): void{?>
<!--        <div class="ajout-recette">-->
            <form method="post" class="cadre" id="ajout-recette-form"  enctype="multipart/form-data" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>ajoutRecetteTraitement.php">
<!--                Ajout des informations de la recette-->
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
        <form  method="post" class = "cadre" id = "ajout-ingredient-form" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>ajoutIngredientTraitement.php"  enctype="multipart/form-data">
            <div class="TitleAjout">Ajouter un ingredient</div>
            <input class = "ajout-input" type="text" id = "nom-ingredient" name="nom-ingredient" placeholder="Entrer le nom de l'ingredient" value = "" required>
            <input class = "ajout-input" class="ajout-input" type="text" id = "unite" name="unite" placeholder="unite" value = "" required>
            <input type="number" class="ajout-input" id = "qte" name="quantite" placeholder="Quantité" value = "" required>

            <label for="photo-ingredient" class="subTitle"> Photo de l'ingredient</label>
            <input type="file" class="ajout-input" id="photo_ingredient" name="photo_ingredient">

            <button type="submit" id="ajouter-ingredient-button" class = "btn" >Insérer</button>
        </form>

    <!--            Pour  ajouter les tags-->
        <form  method="post" class="cadre" id = "ajout-tag-form" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>ajoutTagTraitement.php"  >
            <div class="TitleAjout">Ajouter un tag</div>
            <div>Dessert,Salé,Chaud,Sucré...</div>
            <input class = "ajout-input" type="text" id = "nom-tag" name="nom-tag" placeholder="Entrer un tag" value = "" required>
            <button type="submit" id="ajouter-tag-button" class = "btn" >Insérer</button>
        </form>

        <a href="<?php $GLOBALS['DOCUMENT_DIR'] ?>ajoutRecetteBD.php" style="text-decoration: none; font-size: 0.8cm">Ajouter au recette</a>



            <script src = "<?= $GLOBALS['JS_DIR']?>admin.js"></script>
        <?php
    }

    public function AfficheDonneesTest( $recette , $listeIng, $listeTag): void{
         echo "Nom de la recette est " . $recette['titre'] . " et la photo est " . $recette['photo'] . "<br>";
         foreach ($listeIng as $lg)
             echo "Nom : " . $lg['nom'] . " Photo : " . $lg['photo'] . " Mesure : " . $lg['mesure'] . " Quantité :" . $lg['Qte'] . "<br>"; // quantite
         foreach ($listeTag as $lstag) echo $lstag['nom'] . " ";
    }

    public function AfficheErreur(): void{
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
        if(!isset($_SESSION['nom-tag'])) {
            ?> <div class="erreur"> <?php echo "Veuiller remplir le formulaire des tags!!"; ?></div><?php
        }
    }




}