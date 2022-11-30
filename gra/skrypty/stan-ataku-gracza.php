<?php
session_start();
if($_SESSION['bitwa-stan']=="trwa"){
    if($_SESSION['enemy-stan']<=0){
        require_once "../polaczenie.php";
        $polaczenie = @new mysqli($host, $user, $password, $name);
        $atakowany = $_SESSION['atakowany'];
        $id = $_SESSION['id'];
        
        $zapytanie = "SELECT `zloto` FROM `gracz` WHERE ID = $atakowany";
        $zloto = $polaczenie->query($zapytanie)->fetch_assoc()['zloto'];
        $_SESSION['notification'] = "odebrałes: ".$zloto." złota";
        
        $zapytanie = "UPDATE `gracz` SET zloto = zloto - $zloto WHERE ID = $atakowany";
        $polaczenie->query($zapytanie);
        
        $zapytanie = "UPDATE `gracz` SET zloto = zloto + $zloto WHERE ID = $id";
        $polaczenie->query($zapytanie);
        
        echo json_encode("wygrana");
    }
}
if($_SESSION['bitwa-stan']=="koniec"){
    //wygrana 
    if($_SESSION['enemy-stan']<=0){
        
        require_once "../polaczenie.php";
        $polaczenie = @new mysqli($host, $user, $password, $name);
        $atakowany = $_SESSION['atakowany'];
        $id = $_SESSION['id'];
        
        $zapytanie = "SELECT `zloto` FROM `gracz` WHERE ID = $atakowany";
        $zloto = $polaczenie->query($zapytanie)->fetch_assoc()['zloto'];
        $_SESSION['notification'] = "odebrałes: ".$zloto." złota";
        
        $zapytanie = "UPDATE `gracz` SET zloto = zloto - $zloto WHERE ID = $atakowany";
        $polaczenie->query($zapytanie);
        
        $zapytanie = "UPDATE `gracz` SET zloto = zloto + $zloto WHERE ID = $id";
        $polaczenie->query($zapytanie);
        
        echo json_encode("wygrana");
    }
    else
    {
        $_SESSION['notification'] = "Przegrałeś bitwę";
        echo json_encode("przegrana");
    }
}
?>