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
    <link rel="stylesheet" href="./skrypty/style.css">
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
    <div class="hi"><h1>handlujemy?</h1></div>
    <div class="stats">
            <h4 class="zloto"></h4>
            <h4 class="drewno"></h4>
            <h4 class="zelazo"></h4>
            <h4 class="kamien"></h4>
        </div>
        
    <div class="oferty"></div>

    <div class="sprzedaj">
        <form action="./skrypty/sprzedaj.php" method="post">
        <select name="item">
            <option value="" selected>co chcesz sprzedać?</option>
            <option value="drewno">drewno</option>
            <option value="kamien">kamien</option>
            <option value="zelazo">zelazo</option>
        </select>
        cena:
        <input type="number" name="cena" min="0">
        ilość:
        <input type="number" name="ilosc" min="0">
        <input type="submit" value="Sprzedaj">
        <?php if(isset($_SESSION['BrakSurowcow'])) echo $_SESSION['BrakSurowcow']; ?>
        <?php if(isset($_SESSION['biedak'])) echo $_SESSION['biedak']; ?>
        <?php if(isset($_SESSION['pech'])) echo $_SESSION['pech']; ?>
        </form>
    </div>
    
    <a href="../gra/gra.php">gra</a>

    
    <script src="./skrypty/script.js"></script>
    <script src="./skrypty/handel.js"></script>
</body>
</html>