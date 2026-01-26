<?php

require_once __DIR__ . "../db/connection.php";

header('Content-Type: application/json');

session_start();

$input = file_get_contents('php://input');

$data = json_decode($input, true);

$name = $data['name'];
$password = $data['password'];

if (empty($name) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Faltan datos']);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE name = :name LIMIT 1");
$stmt->execute([':name' => $name]);
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userRow && password_verify($password, $userRow['password'])) {
    
    $_SESSION['user_id'] = $userRow['id'];
    $_SESSION['user_name'] = $userRow['name'];

    echo json_encode([
        'success' => true, 
        'message' => 'Login correcto',
        'user' => [
            'id' => $userRow['id'],
            'name' => $userRow['name']
        ]
    ]);

} else {

    echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
}
