<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$input = file_get_contents("php://input"); 
$input = json_decode($input);

$polaczenie = @new mysqli($host, $user, $password, $name);
if($polaczenie->connect_errno!=0){}else{
   $zapytanie = "SELECT * FROM `oferty`;";
   $wynik = $polaczenie->query($zapytanie);
   $wynik = $wynik->fetch_all(); 
   echo json_encode(["Status"=> "OK", "oferty" => $wynik]);
}
?>