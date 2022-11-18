<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];

$polaczenie = @new mysqli($host, $user, $password, $name);

$rezultat = @$polaczenie->query("SELECT * FROM `gracz` WHERE ID = '$id'");
    $_SESSION['koszt_ulepszenia'] = $rezultat->fetch_assoc()['koszt_ulepszenia'];
    $rezultat->free_result();
    $koszt_ulepszenia = $_SESSION['koszt_ulepszenia'];

    $rezultat = @$polaczenie->query("SELECT * FROM `gracz` WHERE ID = '$id'");
    $_SESSION['kamienPlus'] = $rezultat->fetch_assoc()['kamienPlus'];
    $rezultat->free_result();
    $kamienPlus = $_SESSION['kamienPlus'];

    
if($polaczenie->connect_errno!=0){}else{

    $zapytanie = "SELECT koszt_ulepszenia FROM `gracz` WHERE ID = $id";
    $zapytanie = "SELECT zloto FROM `gracz` WHERE ID = $id";
        $odp=($polaczenie->query($zapytanie))->fetch_assoc();
    if($odp['zloto']>$koszt_ulepszenia){
        //kupujemy ulepszenie
        $cena = $koszt_ulepszenia;
        $sprzedawca = $id;
        $update = round($kamienPlus * 1.50);
        $update_cena = round($cena * 2);

        $zapytanie = "UPDATE `gracz` SET `zloto` = zloto - $cena WHERE ID = '$id'";
            $polaczenie->query($zapytanie);

        $zapytanie = "UPDATE `gracz` SET `kamienPlus` = $update WHERE ID = '$id'";
        $polaczenie->query($zapytanie);

        $zapytanie = "UPDATE `gracz` SET `koszt_ulepszenia` = $update_cena WHERE ID = '$id'";
        $polaczenie->query($zapytanie);
        header('location: ../gra.php');


        echo $update;

        
    }

    else{
        //za mało pieniążków
        echo "nope";
    }
}
?>