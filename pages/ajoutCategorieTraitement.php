<?php
$data = $_POST;



/*Ajout categorie a la bd */
/*Fait comme pour ingredient */
header("Content-Type: application/json");
echo json_encode($data);
exit();