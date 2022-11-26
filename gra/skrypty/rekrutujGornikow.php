<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$polaczenie = @new mysqli($host, $user, $password, $name) ; 
$zapytanie = "SELECT * FROM `gracz` WHERE ID = $id";
$lvl = $polaczenie->query($zapytanie)->fetch_assoc()['lvl'];
$drewno = $polaczenie->query($zapytanie)->fetch_assoc()['drewno'];
$kamien = $polaczenie->query($zapytanie)->fetch_assoc()['kamien'];
$h = $lvl;
$aktualnyCzas = strtotime("+$h hour"."now");
$rok = explode("-",date('Y-m-d-H-i-s',$aktualnyCzas))[0]; 
$miesiac = explode("-",date('Y-m-d-H-i-s',$aktualnyCzas))[1]-1; 
$dzien = explode("-",date('Y-m-d-H-i-s',$aktualnyCzas))[2]; 
$godzina = explode("-",date('Y-m-d-H-i-s',$aktualnyCzas))[3]; 
$minuta = explode("-",date('Y-m-d-H-i-s',$aktualnyCzas))[4]; 
$sekunda = explode("-",date('Y-m-d-H-i-s',$aktualnyCzas))[5];
$format = "$godzina:$minuta-$sekunda-$dzien-$miesiac-$rok";
$drewnominus = 100 * $lvl;
$kamienminus = 100 * $lvl;
if(200 * $lvl <= $drewno && 100 * $lvl <= $kamien){
    $zapytanie = "UPDATE gracz SET `drewno`=drewno-$drewnominus,`kamien`=kamien-$kamienminus ,`czasdozlota`='$format' WHERE ID = $id";
    $polaczenie->query($zapytanie);
    $polaczenie->close();
    $_SESSION['komunikat-zloto'];
    header("Location: ../zloto.php");
}
else{
    echo "chuj ci w dupe nie masz surowców";
    $_SESSION['komunikat-zloto'];
    $polaczenie->close();
    header("Location: ../zloto.php");
}

