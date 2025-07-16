<?php
header('Content-Type: application/json');

// Veritabanı bağlantısını dahil et
require_once '../../../room_scheduler/db_test.php';

// GET parametresinden kullanıcı ID'sini al ve doğrula
$user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);

if (!$user_id) {
    echo json_encode(['data' => [], 'error' => 'Geçersiz kullanıcı ID.']);
    exit;
}

try {
    // SQL sorgusu
    $sql = "SELECT rr.id, rr.lecturer_id, rr.date, rr.start_time, rr.end_time, rr.status, r.name AS room_name
            FROM room_reservations rr
            INNER JOIN rooms r ON rr.room_id = r.id
            WHERE rr.lecturer_id = ?
            ORDER BY rr.date DESC";

    // Sorguyu hazırla ve çalıştır
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);

    // Sonuçları al
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // JSON olarak döndür
    echo json_encode(['data' => $reservations]);

} catch (PDOException $e) {
    // Hata durumunda JSON hata mesajı döndür
    echo json_encode([
        'data' => [],
        'error' => 'Veritabanı hatası: ' . $e->getMessage()
    ]);
}
