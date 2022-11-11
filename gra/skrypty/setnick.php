<?php
session_start();
require_once "../polaczenie.php";

$id = $_SESSION['id'];
$_SESSION['BusyNickname'] = '';

$polaczenie = @new mysqli($host, $user, $password, $name);

if($polaczenie->connect_errno!=0){}else
{
    $nick = $_POST['nick'];
    //tu walidacja czy nick nie jest pusty itp

    $busy = "SELECT * FROM `gracz` WHERE `nick`='$nick'";
    $query = $polaczenie->query($busy);
    if($query->num_rows<=0){
        $zapytanie = "UPDATE `gracz` SET `nick`='$nick' WHERE ID = $id";
        $polaczenie->query($zapytanie);
        header('Location: ../gra.php');
        $rezultat->free_result();
        $polaczenie->close();
    }else{
        $_SESSION['BusyNickname'] = "Nick jest już zajęty";
        header('Location: ../gra.php');
    }
}
?>