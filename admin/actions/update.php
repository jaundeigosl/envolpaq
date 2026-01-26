<?php

header("Content-Type: application/json");

if($_SERVER["REQUEST_METHOD"] == "PUT"){

    $data = $_POST["data"];
    $name = $data["name"];
    $description = $data["description"];
    

}else{

    http_response_code(404);
    return json_encode(["message" => "Incorrect method"]);

}