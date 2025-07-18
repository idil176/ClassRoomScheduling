<?php
include '../../_layout/adminlayout/header.php';
require_once '../../../room_scheduler/db_test.php';

$sql = "SELECT 
    rr.id, rr.date, rr.start_time, rr.end_time, rr.status, rr.created_at,
    COALESCE(l.name, a.name) AS reserver_name,
    r.name AS room_name
FROM room_reservations rr
LEFT JOIN lecturers l ON rr.lecturer_id = l.id
LEFT JOIN admins a ON rr.lecturer_id = a.id
JOIN rooms r ON rr.room_id = r.id
ORDER BY rr.created_at DESC";

$stmt = $pdo->query($sql);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?> 
<style>
  
  .reservations-table {
    max-width: 1000px;
    width: 100%;
    margin: 30px auto; /* ortalama */
    border-collapse: collapse;
    background: rgba(6, 5, 51, 0.6);
    box-shadow: 0 4px 16px rgba(243, 122, 160, 0.2);
    border-radius: 16px;
    overflow: hidden;
    font-family: 'Cormorant Garamond', serif;
  }

  .reservations-table th,
  .reservations-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #f9c5d1;
    color: white;
  }

  .reservations-table thead {
    background-color: rgba(6, 5, 51, 0.6);
    color: white;
  }

  .reservations-table tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.05);
  }

  h2.title {
    text-align: center;
    color: rgb(255, 254, 254);
    margin-top: 40px;
    margin-bottom: 20px;
    font-family: 'Cormorant Garamond', serif;
  }

  body {
    background-color: #0f0e1c;
  }
</style>
<h2 class="title">Rezervations</h2>
<table class="reservations-table">
  <thead style="color:rgb(222, 29, 196);">
    <tr>
      <th>ID</th>
      <th>CREW</th>
      <th>ROOM</th>
      <th>DATE</th>
      <th>START TIME</th>
      <th>END TIME</th>
      <th>STATUS</th>
      <th>CREATED AT</th>
    </tr>
  </thead>
<tbody> <?php foreach ($reservations as $reservation): ?> <tr>
      <td> <?= htmlspecialchars($reservation['id']) ?> </td>
      <td> <?= htmlspecialchars($reservation['reserver_name']) ?> </td>
      <td> <?= htmlspecialchars($reservation['room_name']) ?> </td>
      <td> <?= htmlspecialchars($reservation['date']) ?> </td>
      <td> <?= htmlspecialchars($reservation['start_time']) ?> </td>
      <td> <?= htmlspecialchars($reservation['end_time']) ?> </td>
      <td> <?= htmlspecialchars($reservation['status']) ?> </td>
      <td> <?= htmlspecialchars($reservation['created_at']) ?> </td>
    </tr> <?php endforeach; ?> </tbody>
</table> <?php include '../../_layout/adminlayout/footer.php'; ?>