<?php

require_once __DIR__ . "/../db/connection.php";

try {

    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

    $categoria_id = $_GET['id'];
    $sub_id = $_GET['sub_id'] ?? null;

    // 1. Get Category Details
    $stmtCat = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
    $stmtCat->execute([':id' => $categoria_id]);
    $categoria_actual = $stmtCat->fetch(PDO::FETCH_ASSOC);

    if (!$categoria_actual) {
        die("La categoría solicitada no existe.");
    }

    // 2. Scenario: Subcategory Selected -> Show Products of that Subcategory
    if ($sub_id) {
        // Optional: Get Subcategory Details for titles
        $stmtSub = $pdo->prepare("SELECT * FROM subcategories WHERE id = :id AND category_id = :cat_id");
        $stmtSub->execute([':id' => $sub_id, ':cat_id' => $categoria_id]);
        $subcategoria_actual = $stmtSub->fetch(PDO::FETCH_ASSOC);

        if ($subcategoria_actual) {
            $categoria_actual['name'] = $categoria_actual['name'] . ' - ' . $subcategoria_actual['name'];
            $categoria_actual['description'] = $subcategoria_actual['description'];
        }

        $query = "SELECT * FROM products WHERE category_id = :cat_id AND subcategory_id = :sub_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':cat_id' => $categoria_id, ':sub_id' => $sub_id]);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . "/../views/pages/producto/producto.php";

    } else {
        // 3. Scenario: No Subcategory Selected -> Check if Category has Subcategories
        $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM subcategories WHERE category_id = :id");
        $stmtCheck->execute([':id' => $categoria_id]);
        $hasSubcategories = $stmtCheck->fetchColumn() > 0;

        if ($hasSubcategories) {
            // 3a. Show Subcategories View
            $stmtSubs = $pdo->prepare("SELECT * FROM subcategories WHERE category_id = :id");
            $stmtSubs->execute([':id' => $categoria_id]);
            $result = $stmtSubs->fetchAll(PDO::FETCH_ASSOC); // Variable Expected by View

            require_once __DIR__ . "/../views/pages/subcategories/subcategories.php";
        } else {
            // 3b. Show Products View (Directly)
            $query = "SELECT * FROM products WHERE category_id = :id AND subcategory_id IS NULL";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':id' => $categoria_id]);
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once __DIR__ . "/../views/pages/producto/producto.php";
        }
    }


} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();
}
?>