<?php
include '../../_layout/adminlayout/header.php';
require_once '../../../room_scheduler/db_test.php';

$sql = "SELECT rr.id, rr.date, rr.start_time, rr.end_time, rr.status, rr.created_at, 
               l.name AS lecturer_name, r.name AS room_name
        FROM room_reservations rr
        JOIN lecturers l ON rr.lecturer_id = l.id
        JOIN rooms r ON rr.room_id = r.id
        ORDER BY rr.created_at DESC";
$stmt = $pdo->query($sql);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?> <style>
  .reservations-table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    background: #fffafc;
    box-shadow: 0 4px 16px rgba(243, 122, 160, 0.2);
    border-radius: 16px;
    overflow: hidden;
  }

  .reservations-table th,
  .reservations-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #f9c5d1;
  }

  .reservations-table thead {
    background-color: #f9c5d1;
    color: #4a4a4a;
  }

  .reservations-table tbody tr:hover {
    background-color: #fce4ec;
  }

  h2.title {
    text-align: center;
    color: #f37aa0;
    margin-top: 40px;
    margin-bottom: 20px;
  }
</style>
<h2 class="title">Rezervasyon Listesi</h2>
<table class="reservations-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Akademisyen</th>
      <th>Oda</th>
      <th>Tarih</th>
      <th>Başlangıç</th>
      <th>Bitiş</th>
      <th>Durum</th>
      <th>Oluşturulma</th>
    </tr>
  </thead>
  <tbody> <?php foreach ($reservations as $reservation): ?> <tr>
      <td> <?= htmlspecialchars($reservation['id']) ?> </td>
      <td> <?= htmlspecialchars($reservation['lecturer_name']) ?> </td>
      <td> <?= htmlspecialchars($reservation['room_name']) ?> </td>
      <td> <?= htmlspecialchars($reservation['date']) ?> </td>
      <td> <?= htmlspecialchars($reservation['start_time']) ?> </td>
      <td> <?= htmlspecialchars($reservation['end_time']) ?> </td>
      <td> <?= htmlspecialchars($reservation['status']) ?> </td>
      <td> <?= htmlspecialchars($reservation['created_at']) ?> </td>
    </tr> <?php endforeach; ?> </tbody>
</table> <?php include '../../_layout/adminlayout/footer.php'; ?>