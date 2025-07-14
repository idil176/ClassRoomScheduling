<?php
include '../../_management/Sc.php';
$sc = new Sc();
$sc->checkAccess('user');
$route = $sc->getRouteInfo();
$modul = $route['module'];
$page  = $route['page'];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>ClassroomScheduling | <?= $modul . ' - ' . $page ?></title>

  <!-- Font & CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
  <link href="../../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../../assets/css/custom.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Tema Stili -->
  <style>
    body {
      background-color: rgb(101, 98, 98) !important;
      background-image: url('../../assets/images/ortak.png');
      font-family: 'Cormorant Garamond', serif !important;
    }

    .navbar, .offcanvas-header {
      background-color: rgba(71, 20, 12, 0.6) !important;
    }

    .navbar-brand {
      font-weight: bold;
      font-family: 'Cormorant Garamond', serif;
    }

    .sidebar {
      background-color: rgba(71, 20, 12, 0.6) !important;
    }

    .sidebar .nav-link {
      color: rgb(244, 237, 237);
      padding: 12px 20px;
      font-size: 16px;
      font-weight: 600;
      border-radius: 8px;
      margin: 6px 12px;
      transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover {
      background: linear-gradient(to right, rgb(0, 0, 0), rgb(0, 0, 0));
      color: rgb(244, 237, 237);
      box-shadow: 0 4px 6px rgb(244, 237, 237);
    }

    .sidebar .nav-link.text-danger:hover {
      background-color: rgba(194, 119, 119, 0.1);
      color: rgb(244, 237, 237) !important;
    }

    h1.h2 {
      color: rgb(249, 248, 245);
      font-weight: bold;
    }
  </style>
</head>

<body>
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">
    Classroom Scheduling - <?= $modul ?> Page
  </a>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="sidebar col-md-3 col-lg-2 p-0">

      <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu"
           aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Kullanıcı Paneli</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                  data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto min-vh-100">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 <?= $page === 'Home' ? 'active' : '' ?>"
                 href="../../Pages/User/Home.php">
                <i class="fas fa-home"></i> Ana Sayfa
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 <?= $page === 'MyReservations' ? 'active' : '' ?>"
                 href="../../Pages/User/MyReservations.php">
                <i class="fas fa-calendar"></i> Kayıtlarım
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 <?= $page === 'NewReservation' ? 'active' : '' ?>"
                 href="../../Pages/User/userNewReservation.php">
                <i class="fas fa-plus"></i> Yeni Kayıt
              </a>
            </li>
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 text-danger" href="../../Auth/Logout.php">
                <i class="fas fa-right-from-bracket"></i> Çıkış Yap
              </a>
            </li>
          </ul>
        </div>
      </div>

    </div>

    <!-- MAIN CONTENT -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $page ?></h1>
      </div>
