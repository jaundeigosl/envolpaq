<?php

require_once __DIR__ . "/../db/connection.php";

try {

    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

    $categoria_id = $_GET['id'];

    $stmtCat = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
    $stmtCat->execute([':id' => $categoria_id]);
    $categoria_actual = $stmtCat->fetch(PDO::FETCH_ASSOC);

    if (!$categoria_actual) {
        die("La categoría solicitada no existe.");
    }

    $query = "SELECT * FROM products WHERE category_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $categoria_id]);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require_once __DIR__ . "/../views/pages/producto/producto.php";

} catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
}
?>