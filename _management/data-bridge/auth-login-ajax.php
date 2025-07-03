<?php
require_once '../Sc.php'; // Gerekli sınıf dosyasını dahil eder

if($_POST){ // POST isteği kontrolü
    $sc = new Sc(); // Sc sınıfından nesne oluşturulur
    $email = $_POST['email'] ?? ''; // Email verisi alınır
    $password = $_POST['password'] ?? ''; // Şifre verisi alınır

    $sc->login(email: $email, password: $password, loginEndpoint: 'http://localhost/room_scheduler/login.php');
}
?>