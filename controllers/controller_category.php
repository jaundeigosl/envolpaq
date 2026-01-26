<?php

require_once __DIR__ . "/../db/connection.php";

try{

    $query = "SELECT * FROM `categories`";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require_once __DIR__ . "/../views/pages/catalogo/catalogo.php";

}catch(PDOException $e){

    echo $e->getMessage();
}

?>