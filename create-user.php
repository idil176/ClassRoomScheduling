<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

require_once __DIR__ . '/../room_scheduler/db_test.php';

$request = json_decode(file_get_contents("php://input"), true);

$name = $request['name'] ?? null;
$email = $request['email'] ?? null;
$password = $request['password'] ?? null;

if (!$name || !$email || !$password) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Tüm alanlar zorunludur.'
    ]);
    exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("INSERT INTO lecturers (name, email, password_hash) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $hashed]);

    echo json_encode([
        'status' => 'success',
        'message' => 'Kullanıcı başarıyla eklendi.'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Veritabanı hatası: ' . $e->getMessage()
    ]);
}
