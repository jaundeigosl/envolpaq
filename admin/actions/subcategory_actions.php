<?php
require_once __DIR__ . '/../auth/middleware.php';
require_once __DIR__ . '/../../db/connection.php';

check_auth();

$action = $_POST['action'] ?? '';

try {
    if ($action === 'create') {
        $name = $_POST['name'];
        $desc = $_POST['description'];
        $cat_id = $_POST['category_id'];

        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/imagenes/subcategories/';
            if (!is_dir($uploadDir))
                mkdir($uploadDir, 0777, true);

            $fileName = time() . '_' . basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imagePath = 'public/imagenes/subcategories/' . $fileName;
            }
        }

        $stmt = $pdo->prepare("INSERT INTO subcategories (name, description, category_id, image_url) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $desc, $cat_id, $imagePath]);

        header("Location: ../dashboard.php?success=1");
        exit;

    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $desc = $_POST['description'];
        $cat_id = $_POST['category_id'];

        $sql = "UPDATE subcategories SET name = ?, description = ?, category_id = ?";
        $params = [$name, $desc, $cat_id];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/imagenes/subcategories/';
            if (!is_dir($uploadDir))
                mkdir($uploadDir, 0777, true);

            $fileName = time() . '_' . basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $sql .= ", image_url = ?";
                $params[] = 'public/imagenes/subcategories/' . $fileName;
            }
        }

        $sql .= " WHERE id = ?";
        $params[] = $id;

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        header("Location: ../dashboard.php?success=1");
        exit;

    } elseif ($action === 'delete') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM subcategories WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: ../dashboard.php?success=1");
        exit;
    }

} catch (PDOException $e) {
    header("Location: ../dashboard.php?error=1&message=" . urlencode($e->getMessage()));
    exit;
}
?>