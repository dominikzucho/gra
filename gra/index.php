<?php
    session_start();
    if(@$_SESSION['login']) header('Location: gra.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./skrypty/style_index.css">
</head>
<body>
    
    <h1 class="tytul">AMBITNA GRA NIE MA DRUGIEJ TAKIEJ</h1>
    <div class="formularz">
    <form action="logowanie.php" method="POST">
        <div class="okienko"> <input class="log" type="text" name="login" placeholder="login" ></div>
        <div class="okienko"><input class="log" type="password" name="haslo" placeholder="hasło"></div>
        <div class="okienko"><input class="log1" type="submit" value="Zaloguj się" class="przycisk" /></div>
        <div class="opcje">
        <div class="opcje1">
        <a class="log2" href="rejestracja.php">Zarejestruj się</a>
        </div>
        </div>
        
        

        </div>
        <?php 
    if(isset($_SESSION['blad'])) echo $_SESSION['blad']; 
    ?>
    </form>
    
</body>
</html>