<?php
session_start();

if(isset($_POST['nom-ingredient']) && isset($_POST['unite']) && isset($_POST['quantite']) && isset($_FILES['photo_ingredient']) ){


        if(empty($_FILES['photo_ingredient'])) die("<span style='color : red'>Il n'y a pas de photo d'ingrédients !</span>") ;
        $file = $_FILES['photo_ingredient'];

        if($file['error'] == 0){//tout va bien

            $temp_file_name = $file['tmp_name'] ;
            $file_name = $file['name'] ;
            $dir_name = "../images/ingredients/" ;//l'endroit ou on va insérer l'image !!

            if(!is_dir($dir_name)) mkdir($dir_name) ;//verification de la repertoire si ca existe déjà
            $full_name = $dir_name.$file_name ;
            move_uploaded_file($temp_file_name, $full_name) ;

            $data = array(
                'nom' => $_POST['nom-ingredient'],
                'photo' => $file_name,
                'Qte' => $_POST['quantite'],
                'mesure' => $_POST['quantite']
            );

            if(isset($_SESSION['listeIngredients'])) {
                array_push($_SESSION['listeIngredients'], $data);
                var_dump($_SESSION['listeIngredients']);
            }


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