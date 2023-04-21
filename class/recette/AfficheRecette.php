<?php

namespace recette;

class AfficheRecette{

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
                                    <form method="post" class="recette-index centrer" action="">
                                        <div class="photo-recette centrer">
                                            <img class = "image-recette-index" src="<?= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?>" alt="" />
                                        </div>
                                        <div class="nom-recette-index centrer">
                                            <?= $rec->titre ?>
                                        </div>
                                        <input type="hidden" id="<?= $rec->ID_recette ?>" value="<?= $rec->ID_recette ?>" name="<?= $rec->ID_recette ?>">
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