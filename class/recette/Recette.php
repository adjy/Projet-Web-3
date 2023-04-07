<?php
namespace recette;

use PDO;
use pdo\PdoConnexion;

class Recette extends PdoConnexion {


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

    public function rechercheTerme($terme){
        $statement = parent::getPdo()->prepare("select titre, photo from recette where ID_recette in (select ID_recette from recette where titre like "%$terme%" UNION select ID_recette from 
        listesingredients inner join ingredient A using (ID_ingredient) where A.nom like "%$terme%")") ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ;
        return $results;
    }

}


















