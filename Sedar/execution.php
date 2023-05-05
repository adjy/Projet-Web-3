<?php

$data = $_POST;
if(isset($_FILES['photo_ingredient'])) {
    if (empty($_FILES['photo_ingredient'])) die("<span style='color : red'>Il n'y a pas de photo de recettes insérées !</span>");

    $file = $_FILES['photo_ingredient']; // NB : 'le_fichier' est le name de votre input dans le formulaire

    if ($file['error'] == 0) {//tout va bien
        $temp_file_name = $file['tmp_name'];
        $file_name = $file['name'];

        array_push($data,array('imagesNom'=>$file_name));

        $dir_name = "im/";//l'endroit ou on va insérer l'image !!
        if (!is_dir($dir_name)) mkdir($dir_name);//verification de la repertoire si ca existe déjà
          $full_name = $dir_name . $file_name;
         move_uploaded_file($temp_file_name, $full_name);

    }
}

header("Content-Type: application/json");
echo json_encode($data);
exit();

?>