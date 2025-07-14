<?php 
include '../../_layout/userlayout/header.php'; 
include '../../../room_scheduler/db_test.php';  // Bu dosyada $pdo bağlantısı olduğunu varsayıyorum

try {
    // Akademisyenleri çek
    $stmtLecturers = $pdo->prepare("SELECT id, name FROM lecturers");
    $stmtLecturers->execute();
    $lecturers = $stmtLecturers->fetchAll(PDO::FETCH_ASSOC);

    // Odaları çek
    $stmtRooms = $pdo->prepare("SELECT id, name FROM rooms");
    $stmtRooms->execute();
    $rooms = $stmtRooms->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Veri çekme hatası: " . $e->getMessage());
}
?>

<!-- Buradan sonra dropdownlarınız aynı şekilde çalışacak -->



<div class="row justify-content-center">
  <div class="col-md-6 col-xl-5">
    <div class="card p-4 mt-4 mb-5 shadow-sm" style="background-color: rgba(6, 5, 51, 0.6) !important;">
      <h3 class="text-center mb-4" style="color: rgb(230,230,230); font-family:'Cormorant Garamond', serif;">Yeni Kayıt Oluştur</h3>
      <form id="adduserReservationForm">
        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="userdate" name="date" placeholder="Tarih" required>
          <label for="date">Tarih</label>
        </div>

        <div class="form-floating mb-3">
          <input type="time" class="form-control" id="userstart_time" name="start_time" placeholder="Başlangıç Saati" required>
          <label for="start_time">Başlangıç Saati</label>
        </div>

        <div class="form-floating mb-3">
          <input type="time" class="form-control" id="userend_time" name="end_time" placeholder="Bitiş Saati" required>
          <label for="end_time">Bitiş Saati</label>
        </div>

       

        <div class="form-floating mb-4">
          <select class="form-select" id="userroom_id" name="room_id" required>
            <?php foreach ($rooms as $room): ?>
              <option value="<?= $room['id'] ?>"><?= htmlspecialchars($room['name']) ?></option>
            <?php endforeach; ?>
          </select>
          <label for="room_id">Oda Adı</label>
        </div>

        <input type="hidden" id="usertoken" value="<?= $_SESSION['auth']['token'] ?>" />
        <button type="submit" class="btn btn-admin w-100 py-2">Kayıt Oluştur</button>
      </form>
    </div>
  </div>
</div>

<!-- Stil (ortak temaya uygun) -->
<style>
  .form-control, .form-select {
    border-radius: 8px !important;
    padding: 10px 12px !important;
    border: 2px solid rgb(226, 225, 222);
    background-color: #fef8f0;
    font-family: 'Cormorant Garamond', serif;
  }

  .btn-admin {
    background-color: rgb(230, 228, 227);
    color: rgb(11, 11, 10);
    border-color: rgb(239, 237, 234);
    font-size: 16px;
    font-family: inherit;
    font-weight: bold;
    box-shadow: 0 4px 0 rgb(234, 231, 228);
    transition: all 0.3s ease-in-out;
  }

  .btn-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(232, 232, 232, 0.3);
    background: linear-gradient(to right, rgb(227, 223, 218), #c3a88a);
    color: #000;
    border: 2px solid rgb(222, 218, 213);
  }
</style>

<?php include '../../_layout/userlayout/footer.php'; ?>
