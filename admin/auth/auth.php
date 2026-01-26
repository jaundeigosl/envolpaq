<?php

require_once __DIR__ . "/../../db/connection.php";
require_once __DIR__ . "/../../config.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $password = $_POST['password'];

    if (empty($name) || empty($password)) {
        header("Location: ../login.php?error=empty_fields");
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE name = :name LIMIT 1");
    $stmt->execute([':name' => $name]);
    $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userRow && password_verify($password, $userRow['password'])) {
        $_SESSION['user_id'] = $userRow['id'];
        $_SESSION['user_name'] = $userRow['name'];
        header("Location: ../dashboard.php");
        exit;
    } else {
        header("Location: ../login.php?error=invalid_credentials");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>