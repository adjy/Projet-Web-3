<?php
require_once "config.php" ;
session_start();


if(!isset($_SESSION['test'])) $_SESSION['test'] = array("nom"=>"nom1",
                                                        "age"=>15,
                                                        "taille"=>"1m59");
// Sample array
$data = array("a" => "Apple",
        "b" => "Ball",
        "c" => "Cat");


header("Content-Type: application/json");
echo json_encode($_SESSION['test']);
exit();