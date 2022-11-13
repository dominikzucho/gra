<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];

$oferta = explode(',',$_POST['oferta']);
$polaczenie = @new mysqli($host, $user, $password, $name);
    if($polaczenie->connect_errno!=0){}else{
        $idoferty = $oferta[0];
        $zapytanie = "SELECT ID FROM `oferty` WHERE ID = $idoferty";
        if($polaczenie->query($zapytanie)->num_rows!=0)
        {
        $zapytanie = "SELECT zloto FROM `gracz` WHERE ID = $id";
        $odp=($polaczenie->query($zapytanie))->fetch_assoc();
        if($odp['zloto']>$oferta[4])
        {
            $cena = $oferta[4];
            $sprzedawca = $oferta[1];
            $towar = $oferta[2];
            $ilosc = $oferta[3];
            $zapytanie = "UPDATE `gracz` SET `$towar` = $towar + $ilosc WHERE ID = '$id'";
            $polaczenie->query($zapytanie);
            $zapytanie = "UPDATE `gracz` SET `zloto` = zloto - $cena WHERE ID = '$id'";
            $polaczenie->query($zapytanie);
            $zapytanie = "UPDATE `gracz` SET `zloto` = zloto + $cena WHERE nick = '$sprzedawca'";
            $polaczenie->query($zapytanie);
            $zapytanie = "DELETE FROM oferty WHERE `oferty`.`ID` = $idoferty";
            $polaczenie->query($zapytanie);
            header("Location: ../handel.php");
        }
        else
        {
            ///za malo zlota
        }
        }
        else{
            //oferta wykupiona
        }
    }

?>