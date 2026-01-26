<?php
require_once __DIR__ . "/../../db/connection.php";
require_once __DIR__ . "/../auth/middleware.php";

check_auth();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    try {
        if ($action == 'create') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];

            if (empty($name) || empty($category_id)) {
                header("Location: ../dashboard.php?error=empty_fields_product");
                exit;
            }

            $stmt = $pdo->prepare("INSERT INTO products (name, description, category_id) VALUES (:name, :description, :category_id)");
            $stmt->execute([':name' => $name, ':description' => $description, ':category_id' => $category_id]);
            header("Location: ../dashboard.php?success=product_created");

        } elseif ($action == 'update') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];

            $stmt = $pdo->prepare("UPDATE products SET name = :name, description = :description, category_id = :category_id WHERE id = :id");
            $stmt->execute([':name' => $name, ':description' => $description, ':category_id' => $category_id, ':id' => $id]);
            header("Location: ../dashboard.php?success=product_updated");

        } elseif ($action == 'delete') {
            $id = $_POST['id'];
            $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
            $stmt->execute([':id' => $id]);
            header("Location: ../dashboard.php?success=product_deleted");
        }
    } catch (PDOException $e) {
        header("Location: ../dashboard.php?error=db_error&message=" . urlencode($e->getMessage()));
    }
} else {
    header("Location: ../dashboard.php");
}
?>