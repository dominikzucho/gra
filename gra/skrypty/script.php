<?php
session_start();
require_once "../polaczenie.php";
$input = file_get_contents("php://input"); 
$input = json_decode($input);

if($_SESSION['id']){
    $polaczenie = @new mysqli($host, $user, $password, $name);
    if($polaczenie->connect_errno!=0){}else
    {
        $id = $_SESSION['id'];
        $zapytanie = "SELECT `nick` FROM `gracz` WHERE ID='$id'";
        if($rezultat = $polaczenie->query($zapytanie)){
            $nick = $rezultat->fetch_assoc();
            echo $nick['nick'];
            if($nick['nick']==null) {
                echo json_encode(["Status"=> "OK", "nick" => $nick['nick']]);
            }
        }
    }
}
?>