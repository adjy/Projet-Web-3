<?php
// Sample array
//$data = array("a" => "Apple", "b" => "Ball", "c" => "Cat");
$data = $_POST;
header("Content-Type: application/json");
echo json_encode($data);
exit();

?>