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

$email = $_POST['params']['updates'][0]['param'] == "email" ? $_POST['params']['updates'][0]['value'] : "";
$username = $_POST['params']['updates'][1]['param'] == "username" ? $_POST['params']['updates'][1]['value'] : "";
$password = $_POST['params']['updates'][2]['param'] == "password" ? $_POST['params']['updates'][2]['value'] : "";



if ($email == "") die();


if ($email != "" && $password != "" && $username != "") {
    // set response code - 200 OK
    http_response_code(200);

    if($viewObj->isUserRegistered($email)!=$email ){
        $controllerObj->addNewUser($email, $password , $username);
    }
    else {
        echo json_encode(["success" => false, "message" => "This email is already registered"]);
        return;
    }

    // echo json_encode( $_POST );
    echo json_encode(array(
        "success" => true
    ));
}
else {
    echo json_encode(["success" => false, "message" => "Something went wrong"]);
}




