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

                <div class="liste-Recette-index">
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
    public function AfficherParCategorie($Id_tag,$Listestag,$Tags,$ListesRecettes):void{?>
            <div class="categorieRecettes">
                 <?php  foreach  ($Tags as $tag): ?>
                   <?php if($tag->ID_tag == $Id_tag): ?>
                        <div class="title-Recette-index"><?= $tag->nom ?></div> <!-- Titre de la categorie-->
                    <?php endif;?>
                 <?php endforeach;?>
                       <div class="liste-Recette-index">
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
        <div class="categorieRecettes centrer"><!-- genere un block de categorie -->
            <h1 class="title-Recette-index"> Categories </h1>
            <div class="listeCate">
                <?php foreach ($tags as $t) :?>
                    <?php $image = $gdb->rechercheCategorie($t->ID_tag);
                    if($image != null ):
                        $image = $image[0]->photo; ?>
                        <div class="liste-Recette-index centrer">
                           <?php $this->formulaire->CategorieForm($image,$t);?>
                        </div>
                    <?php endif; ?>
                <?php endforeach;?>
            </div>
        </div>
        <?php
    }

    public function AfficherListesRecherches($recettesRecherchee): void {
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