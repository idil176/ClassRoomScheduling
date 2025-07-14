<?php 
session_start();
include '../../_layout/userlayout/header.php'; ?>
<link href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" rel="stylesheet">
<input id="userId" type="hidden" value="<?php $_SESSION["auth"]["id"];?>">
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
<script>
    $(document).ready(function () {
        var userId = $('#userId').val();

        $('#example').DataTable({
            "ajax": {
                "url": "getUserReservations.php", // BU dosya rezervasyon verilerini JSON olarak döndürmeli
                "type": "POST",
                "data": {
                    user_id: userId
                }
            },
            "columns": [
                { "data": "tarih" },
                { "data": "baslangic_saati" },
                { "data": "bitis_saati" },
                { "data": "durum" },
                { "data": "oda_adi" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<button class="btn btn-danger btn-sm">Sil</button>';
                    }
                }
            ]
        });
    });
</script>
