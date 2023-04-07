<?php
session_start();

if(isset($_POST['nom']) && isset($_FILES['photo_recette'])){

    print_r($_FILES['photo_ingredient']);

    if(empty($_FILES['photo_recette'])) die("<span style='color : red'>Il n'y a pas de photo de recettes insérées !</span>") ;

    $file = $_FILES['photo_recette']; // NB : 'le_fichier' est le name de votre input dans le formulaire

    if($file['error'] == 0 ){//tout va bien

        $temp_file_name = $file['tmp_name'] ;
        $file_name = $file['name'] ;
        $dir_name = "../images/recettes/" ;//l'endroit ou on va insérer l'image !!

        if(!is_dir($dir_name)) mkdir($dir_name) ;//verification de la repertoire si ca existe déjà
        $full_name = $dir_name.$file_name ;
        move_uploaded_file($temp_file_name, $full_name) ;

    }
    else{
        ?>
        <div style="color:red">
             <?php
            if($file['error'] != 0 ) echo "Une erreur dans l'insertion de recettes !! ";
            ?>.
            Le fichier n'a pas été correctement uploadé.
        </div>
        <?php
    }
}

else echo "problem ! ";