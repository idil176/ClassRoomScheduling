<?php
include '../../_management/Sc.php';
$sc = new Sc();
$sc->checkAccess('user');
$route = $sc->getRouteInfo();
$modul = $route['module'];
$page  = $route['page'];
?>
<html>
<head>
    <title>ClassroomScheduling | <?= $modul .' - '. $page?></title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark"><a
            class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Classroom Scheduling - <?= $modul ?> Page</a>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                 aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header"><h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto min-vh-100">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link d-flex align-items-center gap-2 active"
                                                aria-current="page" href="#">
                                <span class="bi">
                                    <i class="fas fa-home"></i>
                                </span>
                                Home Page
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link d-flex align-items-center gap-2" href="#">
                                <span class="bi">
                                    <i class="fas fa-calendar"></i>
                                </span>
                                My Reservations
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link d-flex align-items-center gap-2" href="#">
                                <span class="bi">
                                    <i class="fas fa-plus"></i>
                                </span>
                                New Reservation
                            </a>
                        </li>
                    </ul>
                    <hr class="my-3">
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item"><a class="nav-link d-flex align-items-center gap-2 text-danger" href="../../Auth/Logout.php">
                                <span class="bi">
                                    <i class="fas fa-right-from-bracket"></i>
                                </span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $page?></h1>
            </div>