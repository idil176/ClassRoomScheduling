<?php 
session_start();?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <title>Yeni Rezervasyon</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-light">
<div class="container mt-5">
  <div class="col-md-6 offset-md-3">
    <div class="card shadow-sm p-4">
      <h3 class="text-center mb-4">Yeni Rezervasyon Oluştur</h3>

      <form id="addReservationForm">
        <div class="mb-3">
          <label for="date" class="form-label">Tarih</label>
          <input type="date" class="form-control" id="date" name="date" required />
        </div>

        <div class="mb-3">
          <label for="start_time" class="form-label">Başlangıç Saati</label>
          <input type="time" class="form-control" id="start_time" name="start_time" required />
        </div>

        <div class="mb-3">
          <label for="end_time" class="form-label">Bitiş Saati</label>
          <input type="time" class="form-control" id="end_time" name="end_time" required />
        </div>

        <div class="mb-3">
          <label for="room_id" class="form-label">Hoca</label>
          <select name="lecturer_id" id="lecturer_id">
              <option value='1'>Deneme</option>
              <option value='2'>Deneme 2</option>
              <option value='3'>Deneme 3</option>
          </select>
        </div>
       
        <div class="mb-3">
          <label for="room_id" class="form-label">Oda Adı</label>
          <select name="room_id" id="room_id">
              <option value='1'>Deneme</option>
              <option value='2'>Deneme 2</option>
              <option value='3'>Deneme 3</option>
          </select>
        </div>

        <input id="token" type="hidden" value="<?= $_SESSION['auth']['token']?>">

        <button type="submit" class="btn btn-primary w-100">Rezervasyon Oluştur</button>
      </form>
    </div>
  </div>
</div>

<script>
  $('#addReservationForm').on('submit', function (e) {
    e.preventDefault();

    // Form verilerini al
    const data = {
      date: $('#date').val(),
      start_time: $('#start_time').val(),
      end_time: $('#end_time').val(),
      room_id: $('#room_id').val(),
      lecturer_id: $('#lecturer_id').val()

    };

    var token = $('#token').val();

    // AJAX ile rezervasyon gönder
    $.ajax({
      url: '/room_scheduler/reservations.php',
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(data),
      headers: {
        'Authorization': 'Bearer ' + token
      },
      success: function (response) {
        if (response.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: response.message || 'Rezervasyon kaydedildi.'
          }).then(() => {
            window.location.href = 'reservations.php'; // Başka sayfaya yönlendir
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Hata',
            text: response.message || 'Rezervasyon eklenemedi.'
          });
        }
      },
      error: function (xhr) {
        Swal.fire({
          icon: 'error',
          title: 'Sunucu Hatası',
          text: xhr.responseJSON?.message || 'Bir hata oluştu.'
        });
      }
    });
  });
</script>

</body>
</html>
