<?php
include_once "../Classes/Controller.class.php";
include_once"../Classes/View.class.php";

$controllerObj = new Controller();
$viewObj = new View();

header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

if (empty($_POST['orderID']) && empty($_POST['userID']) && empty($_POST['listingID'])){
    $response = $viewObj->showAllOrders();

    echo json_encode(["response" => $response]);    
}
else if(empty($_POST['orderID']) && !empty($_POST['userID']) && empty($_POST['listingID'])) {
    $response = $viewObj->showOrderByUser($_POST['userID']);

    echo json_encode(["response" => $response]);
}
else if(!empty($_POST['orderID']) && empty($_POST['userID']) && empty($_POST['listingID'])) {
    $response = $viewObj->showOrder($_POST['orderID']);

    echo json_encode(["response" => $response]);
} 
else if(empty($_POST['orderID']) && empty($_POST['userID']) && !empty($_POST['listingID'])) {
    $response = $viewObj->showOrderByListing($_POST['listingID']);

    echo json_encode(["response" => $response]);
}
else die();