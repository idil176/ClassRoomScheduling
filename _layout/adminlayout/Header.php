<?php
include '../../_management/Sc.php';
$sc = new Sc();
$sc->checkAccess('admin');
$route = $sc->getRouteInfo();
$modul = $route['module'];
$page  = $route['page'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ClassroomScheduling | <?= $modul . ' - ' . $page ?></title>

    <!-- Font & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Admin Panel Stil Uyarlaması -->
    <style>
      /* Genel tema */
      body {
        background-color: rgb(101, 98, 98) !important;
        background-image: url('../../assets/images/ortak.png');
        font-family: 'Cormorant Garamond', serif !important;
      }

      /* Navbar */
      .navbar, .offcanvas-header {
        background-color: rgba(71, 20, 12, 0.6) !important;
        color: rgb(8, 8, 7) !important;
      }

      .navbar-brand {
        font-family: 'Cormorant Garamond', serif;
        font-weight: bold;
      }

      /* Sidebar */
      .sidebar {
        background-color: rgba(71, 20, 12, 0.6) !important;

        border-right: 2px solidrgb(232, 231, 230);
      }

      .sidebar .nav-link {
        color:rgb(244, 237, 237);
        padding: 12px 20px;
        font-size: 16px;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        border-radius: 8px;
        margin: 6px 12px;
        transition: all 0.3s ease;
      }

      .sidebar .nav-link i {
        color:rgb(6, 6, 6);
        transition: color 0.3s ease;
      }

      .sidebar .nav-link:hover {
        background: linear-gradient(to right,rgb(0, 0, 0),rgb(0, 0, 0));
        color: rgb(244, 237, 237);
        box-shadow: 0 4px 6px rgb(244, 237, 237);
      }

      .sidebar .nav-link:hover i {
        color: rgb(244, 237, 237);
      }

      .sidebar .nav-link.text-danger {
        color:rgb(239, 236, 236) !important;
      }

      .sidebar .nav-link.text-danger:hover {
        background-color: rgba(194, 119, 119, 0.1);
        box-shadow: 0 4px 6px rgb(244, 237, 237);
        color: rgb(244, 237, 237) !important;
      }

      /* Başlıklar */
      h1.h2 {
        color:rgb(249, 248, 245);
        font-family: 'Cormorant Garamond', serif;
        font-weight: bold;
      }

      /* Kartlar (Dashboard öğeleri) */
      .card {
        background-color:rgb(0, 0, 0);
        border: none;
        box-shadow: 0 4px 10px rgb(244, 237, 237);
        font-family: 'Cormorant Garamond', serif;
      }

      .card-title {
        color:rgb(0, 0, 0);
        font-weight: bold;
      }

      .card-text {
        font-size: 1.5rem;
        color: #000;
      }
    </style>
</head>

<body>
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Classroom Scheduling - <?= $modul ?> Panel</a>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar col-md-3 col-lg-2 p-0 ">

            <div class="offcanvas-md offcanvas-end " tabindex="-1" id="sidebarMenu"
                 aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel">Admin Panel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto min-vh-100">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/AddUser.php">
                                <i class="fas fa-user-plus"></i> Büyücü Ekle
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/AddAdmin.php">
                                <i class="fas fa-user-shield"></i> Kurucu Ekle
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/NewReservation.php">
                                <i class="fas fa-calendar-plus"></i> Yeni Kayıt
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/Reservations.php">
                                <i class="fas fa-calendar-check"></i> Kayıtlar
                            </a>
                        </li>
                    </ul>
                    <hr class="my-3">
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/Home.php">
                                <i class="fas fa-house"></i> Büyük Salon
                            </a>
                        </li>
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
