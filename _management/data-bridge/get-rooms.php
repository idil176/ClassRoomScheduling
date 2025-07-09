<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/room_scheduler/db_test.php';

try {
    $stmt = $pdo->query("
        SELECT id, CONCAT(name, ' - ', building) AS name
        FROM rooms
        WHERE is_active = 1
    ");
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rooms);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Veritabanı hatası']);
}

