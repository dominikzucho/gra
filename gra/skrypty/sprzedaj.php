<?php
    session_start();
    require_once "../polaczenie.php";
    $sprzedaz = $_POST['item'];
    if($sprzedaz=="")header("Location: ../handel.php");
    $ilosc = $_POST['ilosc'];
    $cena = $_POST['cena'];
    $id = $_SESSION['id'];
    $nick = $_SESSION['login'];
    unset($_SESSION["BrakSurowcow"]);

    $polaczenie = @new mysqli($host, $user, $password, $name);
    if($polaczenie->connect_errno!=0){}else{
        $zapytanie = "SELECT $sprzedaz FROM `gracz` WHERE ID = $id";
        //sprawdzamy czy mamy tyle ile chcemy sprzedac
        if($odp=$polaczenie->query($zapytanie)){
            if($odp->fetch_assoc()[$sprzedaz]>=$ilosc){
                //jesli tak to usuwamy 100 surowca
                $zapytanie = "UPDATE `gracz` SET `$sprzedaz` = $sprzedaz - $ilosc WHERE ID = $id";
                $polaczenie->query($zapytanie);
                //tworzymy oferte
                $zapytanie = "INSERT INTO `oferty`(`sprzedawca`, `towar`, `ilosc`, `cena`) VALUES ('$nick','$sprzedaz','$ilosc','$cena')";
                $polaczenie->query($zapytanie);
                header("Location: ../handel.php");
            }
            else
            {
                $_SESSION["BrakSurowcow"]="<p class='error'>Brak Surowców!</p>";
                header("Location: ../handel.php");
            }
        }
    }
?>