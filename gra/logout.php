<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['blad']);
unset($_SESSION['blad1']);
session_destroy();
header('Location: index.php');
?>