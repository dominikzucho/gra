<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$atakowany = $_POST['gracz'];
$_SESSION['atakowany'] = $atakowany;
if($id != $atakowany){
    $polaczenie = @new mysqli($host, $user, $password, $name);
    $zapytanie = "SELECT * FROM `gracz` WHERE ID = $atakowany";
    $odpowiedz = $polaczenie->query($zapytanie);
    if($odpowiedz->num_rows == 1)
    {
        // wszyszystko ok
        $odpowiedz = $polaczenie->query($zapytanie)->fetch_assoc();
        //
        // $_SESSION['enemy-obroncy'] = $odpowiedz["obroncy"];
        // $_SESSION['enemy-atakujacy'] = $odpowiedz["wojownicy"];
        // $_SESSION['enemy-mur'] = $odpowiedz["mur"];

        $_SESSION['enemy-max'] = ($odpowiedz["mur"]*400)+($odpowiedz["obroncy"]*2);
        $_SESSION['enemy-stan'] = ($odpowiedz["mur"]*400)+($odpowiedz["obroncy"]*2);
        $_SESSION['bitwa-stan'] = "przed";


        
        // my
        $zapytanie = "SELECT * FROM `gracz` WHERE ID = $id";
        $odpowiedz = $polaczenie->query($zapytanie)->fetch_assoc();

        $_SESSION['obroncy'] = $odpowiedz["obroncy"];
        $_SESSION['atakujacy'] = $odpowiedz["wojownicy"];
        $_SESSION['mur'] = $odpowiedz["mur"];

        $_SESSION['notification'] = "do boju!";
        header("Location: ../atak.php");
    }
    else
    {
        $_SESSION['notification'] = "atakowany usunął konto xD";
        header("Location: ../zloto.php");
    }
}
else{
    $_SESSION['notification'] = "nie możesz atakować siebie xD";
    header("Location: ../zloto.php");
}
?>