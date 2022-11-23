<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];

//chwila kiedy gracz odbierze złoto
$polaczenie = @new mysqli($host, $user, $password, $name);
$zapytanie = "SELECT * FROM `gracz` WHERE ID = $id";
$odpowiedz = $polaczenie->query($zapytanie)->fetch_assoc();
if($odpowiedz['czasdozlota'] != null)
{
    $chwila = explode("-",$odpowiedz['czasdozlota']);
    $rokG = $chwila[4];
    $miesiacG = $chwila[3];
    $dzienG = $chwila[2];
    $godzinaG = explode(":",$chwila[0])[0];
    $minutaG = explode(":",$chwila[0])[1];
    $sekundaG = $chwila[1];
    //czasy
    $aktualnyCzas = strtotime("now");
    $dataWydarzenia = mktime($godzinaG,$minutaG,$sekundaG,$miesiacG,$dzienG,$rokG);
    $pozostalyCzas = $dataWydarzenia - $aktualnyCzas;
    //jesli czas jest mniejszy od 0 to zbieramy zloto
    if($pozostalyCzas<=0)
    {
        //wyciagamy lvl
        $zapytanie = "SELECT * FROM `gracz` WHERE ID = $id";
        $lvl = $polaczenie->query($zapytanie)->fetch_assoc()['lvl'];
        $szczescie = $polaczenie->query($zapytanie)->fetch_assoc()['szczescie'];
        //dodajemy zloto usuwamy date odbioru
        $addGold = $lvl * $szczescie * 100;
        $zapytanie = "UPDATE `gracz` SET zloto = zloto + $addGold WHERE ID = $id";
        $polaczenie->query($zapytanie);
        $zapytanie = "UPDATE `gracz` SET czasdozlota = null WHERE ID = $id";
        $polaczenie->query($zapytanie);
        header("location: ../zloto.php");
    }
    else
    {
        header("location: ../zloto.php");
    }
    
    
}
else header("location: ../zloto.php");


?>