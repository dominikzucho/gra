<?php
session_start();
require_once "../polaczenie.php";
$id = $_SESSION['id'];
$koniec = $_SESSION['koniec-ataku'];
$aktualnyCzas = strtotime("now");
$ile = ($koniec - $aktualnyCzas);
$_SESSION['czas-bitwy'] = $ile;
if($ile<=0)$_SESSION['bitwa-stan']="koniec";
echo json_encode($ile);
?>