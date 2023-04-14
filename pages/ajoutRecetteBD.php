<?php
session_start();

$recette =  $_SESSION['recette'];
$listeIng = $_SESSION['listeIngredients'];
$listeTag = $_SESSION['nom-tag'];

var_dump($recette->titre);
foreach ($recette as $rec ){
    echo "Le titre de la nouvelle recette est  ".$rec->titre." et la photo est ".$rec->photo;
}