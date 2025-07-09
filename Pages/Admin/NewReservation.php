<?php
include '../../_layout/adminlayout/header.php';

?>

<h3>Yeni Rezervasyon Oluştur</h3>
<form id="addReservationForm">
  <div>
    <label for="date">Tarih</label>
    <input type="date" id="date" name="date" required />
  </div>
  <div>
    <label for="start_time">Başlangıç Saati</label>
    <input type="time" id="start_time" name="start_time" required />
  </div>
  <div>
    <label for="end_time">Bitiş Saati</label>
    <input type="time" id="end_time" name="end_time" required />
  </div>
  <div>
    <label for="lecturer_id">Akademisyen</label>
    <select id="lecturer_id" name="lecturer_id" required>
      <?php foreach ($lecturers as $lecturer): ?>
        <option value="<?= $lecturer['id'] ?>"><?= htmlspecialchars($lecturer['name']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div>
    <label for="room_id">Oda Adı</label>
    <select id="room_id" name="room_id" required>
      <?php foreach ($rooms as $room): ?>
        <option value="<?= $room['id'] ?>"><?= htmlspecialchars($room['name']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <input type="hidden" id="token" value="<?= $_SESSION['auth']['token'] ?>" />
  <button type="submit">Rezervasyon Oluştur</button>
</form>

<?php include '../../_layout/adminlayout/footer.php'; ?>
