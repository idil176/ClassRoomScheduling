<?php include '../../_layout/userlayout/header.php'; ?>
<link href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" rel="stylesheet">
<input id="userId" type="hidden" value="<?= $_SESSION["auth"]["id"];?>">
<div class="table-responsive">
    <table id="example" class="display table table-bordered">
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
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>