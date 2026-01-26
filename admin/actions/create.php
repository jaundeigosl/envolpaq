<?php 

header("Content-Type: application/json");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $data =json_decode(file_get_contents("php://input"), true);
    $name = $data["name"];
    $description = $data["description"];


}else{

    http_response_code(404);
    return json_encode(["message" => "Incorrect method"]);

}