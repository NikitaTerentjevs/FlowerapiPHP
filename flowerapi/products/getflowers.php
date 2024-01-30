<?php
include_once "../Classes/Controller.class.php";
include_once"../Classes/View.class.php";

$controllerObj = new Controller();
$viewObj = new View();

// header("Access-Control-Allow-Origin: *");
// header('Access-Control-Allow-Headers: Content-Type');

header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

$flowername = $_POST['params']['updates'][0]['param'] == "flowerName" ? $_POST['params']['updates'][0]['value'] : "error";

if ($flowername == ""){
    $response = $viewObj->showFlowers();

    echo json_encode([$response]);    
}
else if($flowername) {
    $response = $viewObj->showFlowers($flowername);

    echo json_encode([$response]); 
} else die();