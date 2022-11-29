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
        $obroncy = $gracz['obroncy'];
        $lvl = $gracz['lvl'];
        $maxObroncow = ($mur*100)*($lvl*1.10);
        if($maxObroncow >= $obroncy+$ilosc) 
        {
            echo $cenaZlota = $ilosc * 5;
            echo  $cenaZelaza = $ilosc * 100 * $lvl *0.5;

            $zapytanie = "SELECT * FROM `gracz` WHERE ID = '$id'";
            $odpowiedz = $polaczenie->query($zapytanie)->fetch_assoc();

            echo $posiadaneZloto = $odpowiedz['zloto'];
            echo $posiadaneZelazo = $odpowiedz['zelazo'];

            if($posiadaneZloto>=$cenaZlota&&$posiadaneZelazo>=$cenaZelaza)
            {
                $zapytanie = "UPDATE gracz SET zelazo= zelazo - $cenaZelaza,
                 zloto = zloto - $cenaZlota, obroncy = obroncy + $ilosc WHERE ID = '$id'";
            $polaczenie->query($zapytanie);
            $_SESSION['notification']="Kupiono $ilosc obrońców";header("Location: ../zloto.php");
            } else {
                $_SESSION['notification']="za mało surowców potrzeba: złoto: $cenaZlota żelazo: $cenaZelaza";header("Location: ../zloto.php");
            }


        } else {$_SESSION['notification']="Twoja maksymalna ilość obrońców to $maxObroncow";header("Location: ../zloto.php");};
    }

?>