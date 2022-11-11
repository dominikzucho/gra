<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$input = file_get_contents("php://input"); 
$input = json_decode($input);
$polaczenie = @new mysqli($host, $user, $password, $name);
if($polaczenie->connect_errno!=0){}else{
    $zapytanie = "SELECT kamienPlus FROM `gracz` WHERE ID = $id";
    if($odp=$polaczenie->query($zapytanie)) 
    {
        $oile = $odp->fetch_array()[0];
    }
    $zapytanie = "UPDATE `gracz` SET `kamien` = `kamien` + $oile WHERE ID = $id";
    $odp=$polaczenie->query($zapytanie);
}
?>