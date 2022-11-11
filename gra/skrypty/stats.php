<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$input = file_get_contents("php://input"); 
$input = json_decode($input);

$polaczenie = @new mysqli($host, $user, $password, $name);
if($polaczenie->connect_errno!=0){}else
    {
        $zapytanie= "SELECT * FROM `gracz` WHERE ID = $id";
        if($rezultat = $polaczenie->query($zapytanie))
        {
            $gracz = $rezultat->fetch_assoc();
            echo json_encode(["Status"=> "OK", "stats" => $gracz]);
        }
    }

?>