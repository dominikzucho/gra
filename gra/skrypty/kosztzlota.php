<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$polaczenie = @new mysqli($host, $user, $password, $name);
$zapytanie = "SELECT * FROM `gracz` WHERE ID = $id";
$lvl = $polaczenie->query($zapytanie)->fetch_assoc()['lvl'];
$koszt = "drzewo: ". 200 * $lvl. " kamień: ". 100 * $lvl;
echo json_encode(["koszt" => $koszt]);
?>