<?php
session_start();
if(!$_SESSION['login']) header('Location: index.php');
require_once "polaczenie.php";
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>handel</title>
    <style>
        body{
            background-color:cadetblue;
            display: flex;
            flex-direction: column;
        }
        .hi{
            width: 100%;
            flex-basis: 1;
        }
        .oferty{
            width: 100%;
            flex-basis: 50vh;
            border:2px solid black;
            background-color:darkgrey;
        }
        .stats{
            display: flex;
            justify-content: space-between;
        }
       .oferta{
        display: flex;
       }
    </style>
</head>
<body>
    <div class="hi"><h1>handlujemy?</h1>
        <div class="stats">
            <h4 class="zloto"></h4>
            <h4 class="drewno"></h4>
            <h4 class="zelazo"></h4>
            <h4 class="kamien"></h4>
        </div>
    </div>

    <div class="oferty">

    </div>

    <div class="sprzedaj">
        <form action="sell.php" method="post">
        </form>
    </div>
    
    
    <script src="./skrypty/script.js"></script>
    <script src="./skrypty/handel.js"></script>
</body>
</html>