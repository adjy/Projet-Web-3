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
    public function getListesTagRecettes(){
        $statement = parent::getPdo()->prepare("SELECT * FROM listestag") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }
    public function getTagRecettes(){
        $statement = parent::getPdo()->prepare("SELECT * FROM tag") ;
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
        $statement = parent::getPdo()->prepare("SELECT * FROM ingredient") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }
    public function ajoutRecette( $ID_recette,$titre , $photo){
        $statement = parent::getPdo()->prepare("INSERT INTO recette ( ID_recette,titre,photo) VALUES ( :ID_recette,:titre, :photo)") ;
        $statement->bindValue(':ID_recette', $ID_recette) ;
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

    public function rechercheTerme($mot){
        $sql = "select titre from recette where ID_recette IN(
        select ID_recette from recette where titre like '%".$mot."%' UNION select ID_recette from tag A inner join listestag using (ID_tag)  where A.nom like '%".$mot."%'
    UNION
        select ID_recette from ingredient B inner join listesingredients using (ID_ingredient) where B.nom like '%".$mot."%'
)" ;
        $statement = parent::getPdo()->prepare($sql) ;
        // Exécution de la requête
        $statement->execute() or die(var_dump($statement->errorInfo())) ;

        // Récupération de la réponse sous forme d'un tableau d'objet
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return  $results;
    }

    public function rechercheCategorie($id_Cat){
        $statement = parent::getPdo()->prepare("select photo from recette A inner join listestag B using(ID_recette) where B.ID_tag =" .$id_Cat. " ORDER BY RAND() LIMIT 1") ;

        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }

}


















