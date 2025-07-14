<?php include '../../_layout/userlayout/header.php'; ?>

<div class="container mt-5">
  <h3 class="mb-4 text-white">Kullanıcı Paneli</h3>
  <div class="row g-4">

    <div class="col-md-3">
      <div class="card h-100 shadow-sm" style="background-color: rgba(112, 10, 20, 0.8); color: white;">
        <div class="card-body">
          <h5 class="card-title" style="color: rgba(232, 218, 220, 0.8);">GRYFFINDOR</h5>
          <p class="card-text" style="color: rgba(232, 213, 215, 0.8);">Godric Gryffindor</p>
        </div>
        <div class="card-footer bg-transparent border-0">
          <p class="text-white text-center">Cesaret</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card h-100 shadow-sm" style="background-color: rgba(255, 193, 7, 0.8); color: white;">
        <div class="card-body">
          <h5 class="card-title">HUFFLEPUFF</h5>
          <p class="card-text">Helga Hufflepuff</p>
        </div>
        <div class="card-footer bg-transparent border-0">
          <p style="color: black;" class="text-center">Adalet</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card h-100 shadow-sm" style="background-color: rgba(5, 31, 69, 0.8); color: white;">
        <div class="card-body">
          <h5 class="card-title" style="color: rgba(232, 218, 220, 0.8);">RAVENCLAW</h5>
          <p class="card-text" style="color: rgba(232, 218, 220, 0.8);">Rowena Ravenclaw</p>
        </div>
        <div class="card-footer bg-transparent border-0">
          <p class="text-white text-center">Mantık</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card h-100 shadow-sm" style="background-color: rgba(25, 135, 84, 0.8); color: white;">
        <div class="card-body">
          <h5 class="card-title">SLYTHERIN</h5>
          <p class="card-text">Salazar Slytherin</p>
        </div>
        <div class="card-footer bg-transparent border-0">
          <p class="text-black text-center">Hırs</p>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include '../../_layout/userlayout/footer.php'; ?>

<!-- Engine Script (User Module / Home Page) -->
<script id="engine" 
        src="../../assets/js/engine.js" 
        data-module="User" 
        data-page="Home">
</script>
