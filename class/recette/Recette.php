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


    public function ajoutRecette($IdRecette, $titre , $photo){
        $statement = parent::getPdo()->prepare("INSERT INTO recette (ID_recette, titre,photo) VALUES (:id, :titre, :photo)") ;
        $statement->bindValue(':id', $IdRecette) ;
        $statement->bindValue(':titre', $titre) ;
        $statement->bindValue(':photo', $photo) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;
    }

}


















