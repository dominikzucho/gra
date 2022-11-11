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
    <style>
    form{
        width: fit-content;
        position: absolute;
        top: 45%;
    }
    .przycisk
    {
        margin-top: 15px;
        margin-left:auto;
        margin-right: auto;
    }
    body{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
    }
    h1{
        margin-left: auto;
        margin-right: auto;
    }
    </style>
</head>
<body>
    <h1 class="tytul">AMBITNA GRA NIE MA DRUGIEJ TAKIEJ</h1>
    <form action="logowanie.php" method="POST">
        <label for="login">login:</label><br>
        <input type="text" name="login" ><br>
        <label for="haslo">haslo:</label><br>
        <input type="password" name="haslo"><br>
        <input type="submit" value="Zaloguj się" class="przycisk" />
        <a href="rejestracja.php">Zarejestruj się</a>
        <?php 
    if(isset($_SESSION['blad'])) echo $_SESSION['blad']; 
    ?>
    </form>
    
</body>
</html>