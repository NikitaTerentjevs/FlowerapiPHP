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

$flowername = $_POST['params']['updates'][0]['param'] == "flowerName" ? $_POST['params']['updates'][0]['value'] : "";
$listingID = $_POST['params']['updates'][0]['param'] == "listingID" ? $_POST['params']['updates'][0]['value'] : "";

$flowerSeason = $_POST['params']['updates'][1]['param'] == "flowerSeason" ? $_POST['params']['updates'][1]['value'] : "";
$listingPrice = $_POST['params']['updates'][1]['param'] == "listingPrice" ? $_POST['params']['updates'][1]['value'] : "";
$userID =       $_POST['params']['updates'][1]['param'] == "userID" ? $_POST['params']['updates'][1]['value'] : "";

$flowerCountry = $_POST['params']['updates'][2]['param'] == "flowerCountry" ? $_POST['params']['updates'][2]['value'] : "";
$listingDescription = $_POST['params']['updates'][2]['param'] == "listingDescription" ? $_POST['params']['updates'][2]['value'] : "";


$passedFlower = ($flowername!= "" && $flowerSeason!= "" && $flowerCountry!= "");
$passedListing = ($flowername!= "" && $listingPrice!= "" && $listingDescription!= "");
$passedOrder = $listingID!= "" && $userID!= "";

if ($passedFlower) {
    http_response_code(200);
    if(!($viewObj->showFlowers($flowername))){
        $controllerObj->saveFlower($flowername, $flowerSeason, $flowerCountry);
    }
    else {
        echo json_encode(["success" => false, "message" => "This flower is already exists"]);
        return;
    }

    echo json_encode(["success" => true]);
    return;
}
if ($passedListing) {
    http_response_code(200);
    $controllerObj->saveListing($flowername, $listingPrice, $listingDescription);
    return;
}
if ($passedOrder) {
    http_response_code(200);
    $controllerObj->saveOrder($listingID, $userID);
    return;
}
