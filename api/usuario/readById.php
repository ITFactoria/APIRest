<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

//include database and object files
include_once '../config/database.php';
include_once '../../modelos/usuario.php';

$database = new Database();
$connection = $database->getConnection();

//inialize object
$usuario = new Usuario($connection);

// set ID property of record to read
$usuario->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of user to be edited
$usuario->readById();

if ($usuario->name != null) {
    // create array
    $usuario_array = array(
        "id" =>  $usuario->id,
        "name" => $usuario->name,
        "email" => $usuario->email,
        "password" => $usuario->password,

    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($usuario_array);
} else {

    
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "Object does not exist."));
}
