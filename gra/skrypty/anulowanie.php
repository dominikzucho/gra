<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$hidden = $_POST['hidden'];
echo $hidden . $id;


    $polaczenie = @new mysqli($host, $user, $password, $name);
    $zapytanie = "SELECT * FROM `oferty` WHERE ID = $hidden";
    $towar = $polaczenie->query($zapytanie)->fetch_assoc()['towar'];
    
    $zapytanie = "SELECT * FROM `oferty` WHERE ID = $hidden";
    $ilosc = $polaczenie->query($zapytanie)->fetch_assoc()['ilosc'];

    $zapytanie = "DELETE FROM oferty WHERE `oferty`.`ID` = $hidden";
    $polaczenie->query($zapytanie);
    
    $zapytanie = "UPDATE `gracz` SET $towar = $towar + $ilosc WHERE ID = $id";
    $polaczenie->query($zapytanie);

    header("Location: ../handel.php");

// header("Location: ../handel.php")
?>