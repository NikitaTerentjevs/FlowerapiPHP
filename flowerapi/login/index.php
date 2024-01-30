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
$password = $_POST['params']['updates'][1]['param'] == "password" ? $_POST['params']['updates'][1]['value'] : "";

if ($email && $password) {
    // set response code - 200 OK
    http_response_code(200);


    $isValidLogin = $viewObj->loginUser($email, $password);

    if($isValidLogin == $email) {
       $result = $viewObj->getUserInfo($email, $password);

        echo json_encode(
            [
                "success" => true,
                "message" => "You just logged in!",
                "userData" => $result
            ]
        );

        return;
    }
    else {
        echo json_encode(["success" => false, "message" => "This user is not registered"]);
        return;
    }

    // echo json_encode( $_POST );

}
else {
    // echo json_encode(["success" => false, "message" => $_POST]);
    echo json_encode(["success" => false, "message" => "Something went wrong"]);
}




