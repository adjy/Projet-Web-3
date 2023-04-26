<?php
namespace recette;
use recette\Formulaires;

class Affichages{

    private $formulaire;
    public function __construct(){
        $this->formulaire = new \recette\Formulaires();
    }
    public function AfficherRecette($Id_Recette,$ListesRecettes,$ListesIngredients,$Ingredients,$Listestag): void{
        ?>
         <!-- affichage de ma recette -->
        <div class="recette-cadre">
           <?php foreach ($ListesRecettes as $rec ): ?>
                <?php if($rec->ID_recette == $Id_Recette): ?>
                   <div class="recette-name"> <?= $rec->titre ?> </div> <!--Nom de la recette-->
                                                                       <!-- photo de la recette -->
                   <img class = "recette-picture" src="<?= $GLOBALS['IMG_DIR']."recettes/".$rec->photo ?>" alt="" />
                   <!-- ingredients de la recette  -->


                   <div class="title"> Ingredients</div>

                    <div class="ingredients">
                       <?php foreach ($ListesIngredients as $ListIngr): ?>
                            <?php if($ListIngr->ID_recette == $rec->ID_recette ): ?>
                                <?php foreach  ($Ingredients as $ing): ?>
                                   <?php if($ing->ID_ingredient == $ListIngr->ID_ingredient ): ?>
                                       <li class = "ingredient">
                                           <img class = "ingredient-picture" src="<?= $GLOBALS['IMG_DIR']."ingredients/".$ing->photo ?>" alt="" />
                                           <div class="ingredient-info"><?= $ListIngr->Qte ?> </div>
                                           <div class="ingredient-info"><?= $ListIngr->mesure ?></div>
                                           <div class="ingredient-info"><?= $ing->nom ?></div>
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
            <span  class="info">Si vous avez aimé cette recette, vous devriez essayer ces autres recettes de la même catégorie.
                Elles ont toutes des saveurs uniques qui feront saliver vos papilles gustatives !</span>


            <div class="cadre">
                <div class="items-cadre">

                  <?php foreach  ($tab as $t){?>
                         <!-- affichage de Quelques recette qui appartiennet au meme categorie -->
                        <?php foreach ($ListesRecettes as $rec){
                            if($rec->titre == $t){
                                 $this->formulaire->RecetteForm($rec);
                           }
                        }
                  }
                    ?>
                </div>
            </div>
<?php
    }
    public function AfficherListesRecettes($tags, $listesTags,$recettes):void{
           foreach ($tags as $t) :?>
            <div class="categorieRecettes centrer"><!-- genere un block de categorie -->
                <h1 class="title-Recette-index"> <?= $t->nom ?> </h1>
                <div class="liste-Recette-index centrer">
                    <?php  foreach ($listesTags as $listes){
                         if($listes->ID_tag == $t->ID_tag){?>
                            <!-- ensemble de recette qui appartiennent a cette categorie -->
                               <?php foreach ($recettes as $rec){
                                    if($rec->ID_recette == $listes->ID_recette){
                                       $this->formulaire->RecetteForm($rec);
                                    }
                               }
                         }
                    }
                    ?>
                </div>
            </div>
        <?php endforeach;
    }

    public function AfficherListesRecettesMin($recettes):void{ ?>
        <div class="cadre">
            <div class="items-cadre">
                <?php foreach ($recettes as $rec){
                    $this->formulaire->RecetteForm($rec);
                } ?>
            </div>
        </div>
   <?php }

    public function AfficherParCategorie($Id_tag,$Listestag,$Tags,$ListesRecettes):void{?>
            <div class="cadre">
                 <?php  foreach  ($Tags as $tag): ?>
                   <?php if($tag->ID_tag == $Id_tag): ?>
                        <div class="title-cadre"><?= $tag->nom ?></div> <!-- Titre de la categorie-->
                    <?php endif;?>
                 <?php endforeach;?>
                       <div class="items-cadre">
                             <?php
                             foreach  ($Listestag as $ltags){
                                if($ltags->ID_tag == $Id_tag){
                                    foreach ($ListesRecettes as $rec){
                                        if($rec->ID_recette == $ltags->ID_recette){
                                            $this->formulaire->RecetteForm($rec);
                                        }
                                    }
                                }
                             }
                             ?>
                    </div>
                <?php
        }
    public function AfficherListesCategories($tags,$gdb):void{?>
        <div class="cadre"><!-- genere un block de categorie -->
            <h1 class="title-cadre"> Categories </h1>
            <div class="items-cadre">
                <?php foreach ($tags as $t) :?>
                    <?php $image = $gdb->rechercheCategorie($t->ID_tag);
                    if($image != null ):
                        $image = $image[0]->photo; ?>
                           <?php $this->formulaire->CategorieForm($image,$t);?>

                    <?php endif; ?>
                <?php endforeach;?>
            </div>
        </div>
        <?php
    }

    public function AfficherListesRecherches($recettesRecherchee,$ListesRecettes): void { ?>
    <style>
    #main-content{
        display: none;
    }
</style>
    <div class="search-results">
     <div class="items-cadre">
     <?php
        foreach ($recettesRecherchee as $rec){
            foreach ($ListesRecettes as $rec1){
                if($rec->titre == $rec1->titre){
                     $this->formulaire->RecetteForm($rec1);
                }
            }
        } ?>
         </div>
         </div>
        <?php
    }


     public function AfficheDonneesTest( $recette , $listeIng, $listeTag): void{
         echo "Nom de la recette est " . $recette['titre'] . " et la photo est " . $recette['photo'] . "<br>";
         foreach ($listeIng as $lg)
             echo "Nom : " . $lg['nom'] . " Photo : " . $lg['photo'] . " Mesure : " . $lg['mesure'] . " Quantité :" . $lg['Qte'] . "<br>"; // quantite
         foreach ($listeTag as $lstag) echo $lstag['nom'] . " ";
    }
    public function AfficherErreur(): void{
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