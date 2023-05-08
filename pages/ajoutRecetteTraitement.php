<?php
require_once "../config.php";
require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();
use recette\Donnees;
$gdb = new Donnees();


if(isset( $_POST['nom_recette'] )
    && isset($_FILES['photo_recette']) && isset( $_POST['categorie']) && isset($_POST['choixIngredients'])
    && isset($_POST['Unite']) && isset($_POST['Quantité']) && isset($_POST['Nom-tag']) && isset($_POST['ingredient'])) {


    if (empty($_FILES['photo_recette'])) die("<span style='color : red'>Il n'y a pas de photo de recettes insérées !</span>");
    $file = $_FILES['photo_recette']; // NB : 'le_fichier' est le name de votre input dans le formulaire

    $nomRecette = htmlspecialchars($_POST['nom_recette']);
    if ($file['error'] == 0) {//tout va bien
        $temp_file_name = $file['tmp_name'];
        $file_name = $file['name'];

        $gdb->ajoutRecette($nomRecette,$file_name);
        $idRecette = (int)$gdb->getIdRecette($nomRecette);
        /*var_dump($idRecette);
        var_dump($_POST['choixIngredients']);*/

       foreach ($_POST['categorie'] as $cat){
           $gdb->ajoutCategorieRecette($idRecette,$cat);
       }

        foreach ($_POST['ingredient'] as $ing){
            $ingredient = json_decode($ing,true);
            $gdb->ajoutIngreientRecette($ingredient["id"],$idRecette,(int)$ingredient["quantite"],(int)$ingredient["unite"]);
        }

        $nomtag = htmlspecialchars($_POST['Nom-tag']);

        if(($gdb->getTagId($nomtag))[0]->ID_tag != null){
            $gdb->ajoutTagRecette(($gdb->getTagId($nomtag))[0]->ID_tag, $idRecette);
        }
        else{
            $gdb->ajoutTag($nomtag);
            $gdb->ajoutTagRecette(($gdb->getTagId($nomtag))[0]->ID_tag, $idRecette);
        }
        $dir_name = "../images/recettes/";//l'endroit ou on va insérer l'image !!
        if (!is_dir($dir_name)) mkdir($dir_name);//verification de la repertoire si ca existe déjà
        $full_name = $dir_name . $file_name;
        move_uploaded_file($temp_file_name, $full_name);
    }


}
/*header("Location:".$GLOBALS['PAGES']."Ajout-Reussi.php");
exit();*/



/*
if(isset($_POST['nom']) && isset($_FILES['photo_recette'])){

    if(empty($_FILES['photo_recette'])) die("<span style='color : red'>Il n'y a pas de photo de recettes insérées !</span>") ;

    $file = $_FILES['photo_recette']; // NB : 'le_fichier' est le name de votre input dans le formulaire

    if($file['error'] == 0 ){//tout va bien
        $temp_file_name = $file['tmp_name'];
        $file_name = $file['name'];
        $dir_name = "../images/recettes/" ;//l'endroit ou on va insérer l'image !!
        if(!is_dir($dir_name)) mkdir($dir_name) ;//verification de la repertoire si ca existe déjà
        $full_name = $dir_name.$file_name ;
        move_uploaded_file($temp_file_name, $full_name) ;

       /* $_SESSION['recette'] = new stdClass();
        $_SESSION['recette']-> titre = $_POST['nom'];
        $_SESSION['recette']-> photo = $file_name;*/

//        $_SESSION['recette'] = array(
//            'titre' =>  $_POST['nom'],
//            'photo' => $file_name
//        );

       //echo $_SESSION['recette']['titre'];
//    }
//}
//header("Location:".$GLOBALS['DOCUMENT_DIR']."ajoutRecetteBD.php");
//exit();
