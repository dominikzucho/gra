<?php
session_start();
if($_SESSION['bitwa-stan']=="trwa"){
    $_SESSION['enemy-stan'] = $_SESSION['enemy-stan'] - $_SESSION['atakujacy'];
    echo json_encode(["stan" => $_SESSION['enemy-stan'],"max"=> $_SESSION['enemy-max']]);
}

?>