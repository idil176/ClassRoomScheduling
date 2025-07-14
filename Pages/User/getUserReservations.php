<?php
header('Content-Type: application/json');

// Veritabanı bağlantısını dahil et
include '../../../room_scheduler/db_test.php';
// Kullanıcı ID'sini al
$user_id = $_GET['user_id'] ?? null;

if (!$user_id) {
    echo json_encode(['data' => []]);
    exit;
}


// SQL sorgusu ile rezervasyonları çek
$sql = "SELECT rr.id, rr.lecturer_id, rr.date, rr.start_time, rr.end_time, rr.status, r.name AS room_name
        FROM room_reservations rr
        INNER JOIN rooms r ON rr.room_id = r.id
        WHERE rr.lecturer_id = ?
        ORDER BY rr.date DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON olarak veriyi döndür
echo json_encode(['data' => $reservations]);
