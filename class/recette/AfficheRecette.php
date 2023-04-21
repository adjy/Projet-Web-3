<?php

namespace recette;

class AfficheRecette{

    public function UneRecette($Id_Recette,$ListesRecettes,$ListesIngredients,$Ingredients,$Listestag): void{?>
         <!-- affichage de ma recette -->
        <div class="recette">
           <?php foreach ($ListesRecettes as $rec ): ?>
                <?php if($rec->ID_recette == $Id_Recette): ?>
                   <div class="nom-recette"> <?= $rec->titre ?> </div> <!--Nom de la recette-->
                                                                       <!-- photo de la recette -->
                   <img class = "image-recette" src="<?= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?>" alt="" />
                   <!-- ingredients de la recette  -->

                   <div class="description-recette">
                       <div class="titleIngredientsRecette"> Ingredients</div>
                   </div>
                    <div class="list-ingredients">
                       <?php foreach ($ListesIngredients as $ListIngr): ?>
                            <?php if($ListIngr->ID_recette == $rec->ID_recette ): ?>
                                <?php foreach  ($Ingredients as $ing): ?>
                                   <?php if($ing->ID_ingredient == $ListIngr->ID_ingredient ): ?>
                                       <li class = "ingredient">
                                           <img class = "image-ingredient" src="<?= $GLOBALS['IMG_DIR']."ingredients/".$ing->photo ?>" alt="" />
                                           <div class="infos-ingre"><?= $ListIngr->Qte ?> </div>
                                           <div class="infos-ingre"><?= $ListIngr->mesure ?></div>
                                           <div class="infos-ingre"><?= $ing->nom ?></div>
                                       </li>
                                     <?php endif;?>
                                <?php endforeach;?>
                             <?php endif;?>
                       <?php endforeach;?>
                   </div>

                <?php endif;?>
           <?php endforeach;?>
            <div class="description">
               DESCRIPITION :::::crust and a rich chocolate
                glaze is a decadent dessert that is ultra creamy and smooth. If you are
                a chocolate lover, this cheesecake with THREE different chocolate layers is for you!"
            </div>
        </div>
            <!---->
                <?php
                $tab = array();
                foreach ($Listestag as $ltags){
                    if($ltags->ID_recette == $Id_Recette){
                        foreach ($Listestag as $ltags1){
                            if($ltags1->ID_tag == $ltags->ID_tag){
                                foreach ($ListesRecettes as $rec){
                                    if($ltags1->ID_recette == $rec->ID_recette  && $rec->ID_recette != $Id_Recette){
                                        $tab[] = $rec->titre;
                                    }
                                }
                            }
                        }
                    }
                }
                $tab = array_unique($tab);?>
                <div class="categorieRecettes centrer">
                <div class="title-Recette-index">Quelques recettes de ...</div>
                  <?php foreach  ($tab as $t):?>
                         <!-- affichage de Quelques recette qui appartiennet au meme categorie -->

                        <?php foreach ($ListesRecettes as $rec):?>
                             <?php if($rec->titre == $t): ?>
                                <div class="recette-index centrer">
                                    <div class="photo-recette">
                                        <img class = "image-recette-index"  src="<?= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?>" alt="Dinosaur" />
                                    </div>
                                    <div class="nom-recette-index">
                                        <?= $rec->titre ?>
                                    </div>
                                </div>
                             <?php endif;?>
                          <?php endforeach;?>

                <?php endforeach;?>
                </div>

<?php
    }

    public function ListesRecettes($tags, $listesTags,$recettes):void{
           foreach ($tags as $t) :?>
            <div class="categorieRecettes centrer"><!-- genere un block de categorie -->
                <h1 class="title-Recette-index"> <?= $t->nom ?> </h1>

                <div class="liste-Recette-index centrer">
                    <?php  foreach ($listesTags as $listes) : ?>
                        <?php if($listes->ID_tag == $t->ID_tag) : ?>
                            <!-- ensemble de recette qui appartiennent a cette categorie -->
                            <?php foreach ($recettes as $rec): ?>
                                <?php if($rec->ID_recette == $listes->ID_recette) : ?>
                                    <form method="post" class="recette-index centrer" action="<?= $GLOBALS['DOCUMENT_DIR'] ?>pages/afficheRecette.php">
                                        <div class="photo-recette centrer">
                                            <img class = "image-recette-index" src="<?= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?>" alt="" />
                                        </div>
                                        <div class="nom-recette-index centrer">
                                            <?= $rec->titre ?>
                                        </div>
                                        <input type="hidden" name="Id_recette" id="<?= $rec->ID_recette ?>" value="<?= $rec->ID_recette ?>" >
                                    </form>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        <?php endforeach;
    }


    public function ListesRecherches($recettesRecherchee): void {
        foreach ($recettesRecherchee as $rec): ?>
            <div class="recette-index centrer">
                <div class="photo-recette centrer">
                    <img class = "image-recette-index" src="<?= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?>" alt="" />
                </div>
                <div class="nom-recette-index centrer">
                    <?= $rec->titre ?>
                </div>
            </div>
        <?php endforeach;
    }


}