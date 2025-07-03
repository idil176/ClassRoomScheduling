<?php
session_start();
session_destroy();

Header('Location: Sign-in.php');

?>