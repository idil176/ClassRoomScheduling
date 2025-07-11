<?php include '../../_layout/adminlayout/header.php'; ?>

<div class="row justify-content-center">
  <div class="col-md-6 col-xl-5">
    <div class="card p-4 mt-4 mb-5 shadow-sm" style="background-color: rgba(6, 5, 51, 0.6) !important;">
      <h3 class="text-center mb-4" style="color: rgb(230,230,230); font-family:'Cormorant Garamond', serif;">Yeni Kayıt Oluştur</h3>
      <form id="addReservationForm">
        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="date" name="date" placeholder="Tarih" required>
          <label for="date">Tarih</label>
        </div>

        <div class="form-floating mb-3">
          <input type="time" class="form-control" id="start_time" name="start_time" placeholder="Başlangıç Saati" required>
          <label for="start_time">Başlangıç Saati</label>
        </div>

        <div class="form-floating mb-3">
          <input type="time" class="form-control" id="end_time" name="end_time" placeholder="Bitiş Saati" required>
          <label for="end_time">Bitiş Saati</label>
        </div>

        <div class="form-floating mb-3">
          <select class="form-select" id="lecturer_id" name="lecturer_id" required>
            <?php foreach ($lecturers as $lecturer): ?>
              <option value="<?= $lecturer['id'] ?>"><?= htmlspecialchars($lecturer['name']) ?></option>
            <?php endforeach; ?>
          </select>
          <label for="lecturer_id">Akademisyen</label>
        </div>

        <div class="form-floating mb-4">
          <select class="form-select" id="room_id" name="room_id" required>
            <?php foreach ($rooms as $room): ?>
              <option value="<?= $room['id'] ?>"><?= htmlspecialchars($room['name']) ?></option>
            <?php endforeach; ?>
          </select>
          <label for="room_id">Oda Adı</label>
        </div>

        <input type="hidden" id="token" value="<?= $_SESSION['auth']['token'] ?>" />
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

<?php include '../../_layout/adminlayout/footer.php'; ?>
