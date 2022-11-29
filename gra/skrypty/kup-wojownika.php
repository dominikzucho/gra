<?php
session_start();
require_once "../polaczenie.php";

    $polaczenie = @new mysqli($host, $user, $password, $name);
    if($polaczenie->connect_errno!=0){}else
    {
        $id = $_SESSION['id'];
        $zapytanie = "SELECT * FROM `gracz` WHERE ID='$id'";
        $rezultat = $polaczenie->query($zapytanie);
        $ilosc = $_POST['ilosc'];
        if($ilosc==null){$_SESSION['notification']="podaj ilość";header("Location: ../zloto.php");}
        $gracz = $rezultat->fetch_assoc();
        $mur = $gracz['mur'];
        $wojownicy = $gracz['wojownicy'];
        $lvl = $gracz['lvl'];
        $maxWojownikow = ($mur*100)*($lvl*1.10);
        if($maxWojownikow >= $wojownicy+$ilosc) 
        {
            echo $cenaZlota = $ilosc * 10;
            echo  $cenaZelaza = $ilosc * 100 * $lvl *0.75;

            $zapytanie = "SELECT * FROM `gracz` WHERE ID = '$id'";
            $odpowiedz = $polaczenie->query($zapytanie)->fetch_assoc();

            echo $posiadaneZloto = $odpowiedz['zloto'];
            echo $posiadaneZelazo = $odpowiedz['zelazo'];

            if($posiadaneZloto>=$cenaZlota&&$posiadaneZelazo>=$cenaZelaza)
            {
                $zapytanie = "UPDATE gracz SET zelazo= zelazo - $cenaZelaza,
                 zloto = zloto - $cenaZlota, wojownicy = wojownicy + $ilosc WHERE ID = '$id'";
            $polaczenie->query($zapytanie);
            $_SESSION['notification']="Kupiono $ilosc obrońców";header("Location: ../zloto.php");
            } else {
                $_SESSION['notification']="za mało surowców potrzeba: złoto: $cenaZlota żelazo: $cenaZelaza";header("Location: ../zloto.php");
            }


        } else {$_SESSION['notification']="Twoja maksymalna ilość wojowników to $maxWojownikow";header("Location: ../zloto.php");};
    }

?>