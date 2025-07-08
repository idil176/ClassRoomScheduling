<?php include '../../_layout/adminlayout/header.php'; ?>

<div class="row justify-content-center">
  <div class="col-md-6 col-xl-5">
    <div class="card p-4 mt-4 mb-5 shadow-sm">
      <h3 class="text-center mb-4" style="color:#715A3A; font-family:'Cormorant Garamond', serif;">Yeni Admin Ekle</h3>
      <form id="addAdminForm">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="Ad Soyad" required>
          <label for="name">Ad Soyad</label>
        </div>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="E-posta" required>
          <label for="email">E-posta</label>
        </div>

        <div class="form-floating mb-4">
          <input type="password" class="form-control" id="password" name="password" placeholder="Şifre" required>
          <label for="password">Şifre</label>
        </div>
        <input type="hidden" value="<?= $_SESSION["auth"]["token"];?>" id="token" />
        <button class="btn btn-admin w-100 py-2" type="submit">Admin Olarak Ekle</button>
      </form>
    </div>
  </div>
</div>

<style>
  .form-control {
    border-radius: 8px !important;
    padding: 10px 12px !important;
    border: 2px solidrgb(226, 225, 222);
    background-color: #fef8f0;
    font-family: 'Cormorant Garamond', serif;
  }

  .btn-admin {
    background-color:rgb(230, 228, 227);
    color: rgb(11, 11, 10);
    border-color:rgb(239, 237, 234);
    font-size: 16px;
    font-family: inherit;
    font-weight: bold;
    box-shadow: 0 4px 0rgb(234, 231, 228);
    transition: all 0.3s ease-in-out;
  }

  .btn-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(232, 232, 232, 0.3);
    background: linear-gradient(to right,rgb(227, 223, 218), #c3a88a);
    color: #000;
    border: 2px solidrgb(222, 218, 213);
  }
</style>

<script>
  document.getElementById('addAdminForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    var token = $('#token').val();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    if (!token) {
      Swal.fire({
        icon: 'error',
        title: 'Yetkisiz',
        text: 'Giriş yapmanız gerekiyor.',
        confirmButtonColor: '#715A3A'
      });
      return;
    }

    try {
      const response = await fetch('/room_scheduler/create-admin.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': `Bearer ${token}`
        },
        body: JSON.stringify(data)
      });

      const result = await response.json();
      console.log(response.status);
      if (response.status == 201) {
        Swal.fire({
          icon: 'success',
          title: 'Admin başarıyla eklendi!',
          confirmButtonText: 'Tamam',
          confirmButtonColor: '#715A3A'
        }).then(() => {
          window.location.href = 'Home.php';
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Hata',
          text: result.message || 'Bir hata oluştu.',
          confirmButtonColor: '#715A3A'
        });
      }

    } catch (error) {
      Swal.fire({
        icon: 'error',
        title: 'Sunucu Hatası',
        text: 'Lütfen daha sonra tekrar deneyin.',
        confirmButtonColor: '#715A3A'
      });
    }
  });
</script>

<?php include '../../_layout/adminlayout/footer.php'; ?>
