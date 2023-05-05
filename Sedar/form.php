<?php
session_start();
require_once "../config.php" ;



require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register(); ?>

<link rel="stylesheet" href="../css/main.css">
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
<form  method="post" class = "cadre" id = "ajout-ingredient-form" action = "execution.php" enctype="multipart/form-data">
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

<script src = "js.js"></script>