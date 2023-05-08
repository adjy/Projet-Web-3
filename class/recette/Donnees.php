<?php
namespace recette;

use PDO;
use pdo\PdoConnexion;

class Donnees extends PdoConnexion {

    public function getRecettes(){
        $statement = parent::getPdo()->prepare("SELECT * FROM recette") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
        // return parent::getPdo();
    }
    public function getListescategorieRecettes(){
        $statement = parent::getPdo()->prepare("SELECT * FROM listescategorie") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }
    public function getcategorieRecettes(){
        $statement = parent::getPdo()->prepare("SELECT * FROM categorie") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }
    public function getListesIngredients(){
        $statement = parent::getPdo()->prepare("SELECT * FROM listesingredients") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }
    public function getIngredient(){
        $statement = parent::getPdo()->prepare("SELECT * FROM ingredient ORDER BY nom ASC") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }
    public function ajoutRecette( $titre , $photo){
        $statement = parent::getPdo()->prepare("INSERT INTO recette ( titre,photo) VALUES (:titre, :photo)") ;
        $statement->bindValue(':titre', $titre) ;
        $statement->bindValue(':photo', $photo) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
    }
    public function ajoutIngredient( $nom , $photo){
        $statement = parent::getPdo()->prepare("INSERT INTO ingredient ( nom,photo) VALUES ( :nom, :photo)") ;
        $statement->bindValue(':nom', $nom) ;
        $statement->bindValue(':photo', $photo) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
    }
    public function ajoutCategorie( $nom){
        $statement = parent::getPdo()->prepare("INSERT INTO categorie (nom) VALUES ( :nom)") ;
        $statement->bindValue(':nom', $nom) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
    }
    public function rechercheTerme($mot){
        $sql = "select titre from recette where ID_recette IN(
        select ID_recette from recette where titre like '%".$mot."%' UNION select ID_recette from categorie A inner join listescategorie using (ID_categorie)  where A.nom like '%".$mot."%'
    UNION
        select ID_recette from ingredient B inner join listesingredients using (ID_ingredient) where B.nom like '%".$mot."%'
)" ;
        $statement = parent::getPdo()->prepare($sql) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return  $results;
    }

    public function rechercheCategorie($id_Cat){
        $statement = parent::getPdo()->prepare("select photo from recette A inner join listescategorie B using(ID_recette) where B.ID_categorie =" .$id_Cat. " ORDER BY RAND() LIMIT 1") ;

        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }
    public function rechercheRecetteMin(){
        $statement = parent::getPdo()->prepare("select * from recette ORDER BY RAND() LIMIT 5") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }

    public function supprimerRecette($id){
        $statement = parent::getPdo()->prepare(" delete from recette where  ID_recette = ". $id) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
    }

    public function miseAjourSupprimer(){
        $statement = parent::getPdo()->prepare("delete from ingredient where ID_ingredient not in( select ID_ingredient from listesingredients)") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;

        $statement = parent::getPdo()->prepare("delete from categorie where ID_categorie not in( select ID_categorie from listescategorie)") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;

    }
    public function getIdRecette($nomRecette){
        $statement = parent::getPdo()->prepare("select ID_recette from recette  where titre ='".$nomRecette."' ") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }

    public function getIdIngredient($nomIng){
        $statement = parent::getPdo()->prepare("select ID_ingredient from ingredient  where nom ='".$nomIng."' ") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }

    public function getIdCategorie($nomcat){
        $statement = parent::getPdo()->prepare("select ID_categorie from categorie  where nom ='".$nomcat."' ") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }

    public function ajoutCategorieRecette($ID_recette, $ID_categorie){
        $statement = parent::getPdo()->prepare("INSERT INTO  listescategorie (ID_recette, ID_categorie ) VALUES ( :ID_recette, :ID_categorie )") ;
        $statement->bindValue(':ID_recette', $ID_recette) ;
        $statement->bindValue(':ID_categorie', $ID_categorie) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
    }


    public function ajoutIngreientRecette($ID_ingredient, $ID_recette, $qte, $mesure){
        $statement = parent::getPdo()->prepare("INSERT INTO listesingredients (ID_ingredient, ID_recette, Qte, mesure) VALUES (:ID_ingredient, :ID_recette, :qte, :mesure )") ;
        $statement->bindValue(':ID_recette', $ID_recette) ;
        $statement->bindValue(':ID_ingredient', $ID_ingredient) ;
        $statement->bindValue(':qte', $qte) ;
        $statement->bindValue(':mesure', $mesure) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
    }

    public function ajoutTagRecette($ID_tag, $ID_recette){
        $statement = parent::getPdo()->prepare("INSERT INTO listestag (ID_tag, ID_recette) VALUES (:ID_tag, :ID_recette)") ;
        $statement->bindValue(':ID_recette', $ID_recette) ;
        $statement->bindValue(':$ID_tag', $ID_tag) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
    }


}



















