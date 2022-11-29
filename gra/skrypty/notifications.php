<?php
session_start();
if(isset($_SESSION['notification'])==true){
    $notification = $_SESSION['notification'];
    unset($_SESSION['notification']);
    echo json_encode(["notification"=>$notification]);
    unset($notification);
}
?>