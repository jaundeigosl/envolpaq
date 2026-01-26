<?php
require_once __DIR__ . "/../../db/connection.php";
require_once __DIR__ . "/../auth/middleware.php";

check_auth();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    // Helper to handle upload
    function handleImageUpload()
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/imagenes/';

            // Create dir if not exists (just in case)
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $fileName = basename($_FILES['image']['name']);
            // Avoid duplicates overwriting
            $targetPath = $uploadDir . uniqid() . '_' . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                // Return relative path for DB
                return 'public/imagenes/' . basename($targetPath);
            }
        }
        return null;
    }

    try {
        if ($action == 'create') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image_url = handleImageUpload();

            // Basic validation
            if (empty($name)) {
                header("Location: ../dashboard.php?error=empty_fields_category");
                exit;
            }

            $stmt = $pdo->prepare("INSERT INTO categories (name, description, image_url) VALUES (:name, :description, :image_url)");
            $stmt->execute([':name' => $name, ':description' => $description, ':image_url' => $image_url]);
            header("Location: ../dashboard.php?success=category_created");

        } elseif ($action == 'update') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $new_image = handleImageUpload();

            if ($new_image) {
                // Update with new image
                $stmt = $pdo->prepare("UPDATE categories SET name = :name, description = :description, image_url = :image_url WHERE id = :id");
                $stmt->execute([':name' => $name, ':description' => $description, ':image_url' => $new_image, ':id' => $id]);
            } else {
                // Keep old image
                $stmt = $pdo->prepare("UPDATE categories SET name = :name, description = :description WHERE id = :id");
                $stmt->execute([':name' => $name, ':description' => $description, ':id' => $id]);
            }

            header("Location: ../dashboard.php?success=category_updated");

        } elseif ($action == 'delete') {
            $id = $_POST['id'];

            // Optional: Delete file from server (skipped for now to stay simple)

            $stmt = $pdo->prepare("DELETE FROM categories WHERE id = :id");
            $stmt->execute([':id' => $id]);
            header("Location: ../dashboard.php?success=category_deleted");
        }
    } catch (PDOException $e) {
        header("Location: ../dashboard.php?error=db_error&message=" . urlencode($e->getMessage()));
    }
} else {
    header("Location: ../dashboard.php");
}
?>