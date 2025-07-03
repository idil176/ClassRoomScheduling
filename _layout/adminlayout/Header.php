<?php
include '../../_management/Sc.php';
$sc = new Sc();
$route = $sc->getRouteInfo();
$modul = $route['module'];
$page  = $route['page'];
?>

<html>
<head>
    <title>ClassroomScheduling | <?= $modul .' - '. $page?></title>
</head>
<body>