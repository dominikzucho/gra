<?php
session_start();
require_once "../polaczenie.php";
if($_SESSION['bitwa-stan']=="przed"){
    $_SESSION['koniec-ataku'] = strtotime("+10 second"."now");
    $_SESSION['bitwa-stan']="trwa";
}
echo $_SESSION['bitwa-stan']. $_SESSION['koniec-ataku'];
?>