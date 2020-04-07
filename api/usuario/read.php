<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");


//include database and object files
include_once '../config/database.php';
include_once '../../modelos/usuario.php';

$database = new Database();
$connection = $database->getConnection();

//inialize object
$usuario= new Usuario($connection);

//query objects
$stmt = $usuario->read();
$count = $stmt->rowCount();

if($count > 0){

    $usuarios = array();
    $usuarios["records"] = array();
    
    //$usuarios["count"] = $count;

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        //extract row
        extract($row);

        $usuario_item  = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "password" => $password,
             
        );
        array_push($usuarios["records"], $usuario_item);
    }
    //set response code - 200: OK
    http_response_code(200);

    //show products data in json format
    echo json_encode($usuarios);
}

else {
    //set response code - 404: Not Found
    http_response_code(404);
    echo json_encode(
        array("message" => "No users found"));
        #array("body" => array(), "count" => 0));
}
