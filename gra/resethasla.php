<?php
session_start();
if(isset($_POST['zmien'])){
    $oldpas = $_POST['oldpas'];
    $newpas = $_POST['newpas'];
    $newpas2 = $_POST['newpas2'];

    $walidacja = true;
if(!ctype_alnum($oldpas))
 {
 $walidacja = false;
 $_SESSION['oldpas_error'] = 'Wprowadzono złe hasło!';
 }

 if($newpas != $newpas2)
 {
 $walidacja = false;
 $_SESSION['newpas_error'] = 'Hasła są różne';
 }
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rejestracja</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./skrypty/style_index.css">
    <style>
        body{
            background-image: url(img/tło_logowanie_główne.jpg);
            font-family: 'Courgette', cur
            
        }

        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h2>Wpisz dane aby założyć konto: </h2>
    <div class="formularz">
        <form action="resethasla.php" method="POST">
        <div class="okienko"><input class="log" type="text" name="oldpas" placeholder="stare hasło" ></div>
        <?php
                if(isset( $_SESSION['oldpas_error']))
                {
                    echo  $_SESSION['oldpas_error'];
                    unset( $_SESSION['oldpas_error']);
                }
                ?>
        <div class="okienko"><input class="log" type="text" name="newpas" placeholder="nowe hasło" ></div>
        <div class="okienko"><input class="log" type="text" name="newpas2" placeholder="powtórz hasło" ></div>
        <input class="przycisk" type="submit" name="zmien" value="zmien" >
        </form>
    </div>
        </body>
</html>