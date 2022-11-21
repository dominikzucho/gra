<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$input = file_get_contents("php://input"); 
$input = json_decode($input);

$polaczenie = @new mysqli($host, $user, $password, $name);
if($polaczenie->connect_errno!=0){}else
    {
        $zapytanie = "SELECT `czasdozlota` FROM `gracz` WHERE `ID` = $id";
        $odpowiedz = $polaczenie->query($zapytanie);
        $czas = explode('-',$odpowiedz->fetch_assoc()["czasdozlota"]);
        echo json_encode(["czas" => $czas]);
    }
?>