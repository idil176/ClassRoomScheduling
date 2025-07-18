<?php include '../../_layout/userlayout/header.php'; ?>
<input id="userId" type="hidden" value="<?= $_SESSION["auth"]["id"];?>">
<link href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" rel="stylesheet">
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
<div class="table-responsive">
    <table id="example2" class="reservations-table">
        <thead>
        <tr>
            <th>Tarih</th>
            <th>Başlangıç Saati</th>
            <th>Bitiş Saati</th>
            <th>Durumu</th>
            <th>Oda Adı</th>
            <th>İşlemler</th>
        </tr>
        </thead>
    </table>
</div>


<?php include '../../_layout/userlayout/footer.php'; ?>

