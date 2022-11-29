<?php
session_start();

//walidacja formularza
if(isset($_POST['zaloz']))
{
 $login = $_POST['login'];
 $email = $_POST['email'];
 $haslo1 = $_POST['haslo1'];
 $haslo2 = $_POST['haslo2'];

 $walidacja = true;

 if(!ctype_alnum($login))
 {
 $walidacja = false;
 $_SESSION['login_error'] = 'Login musi składać się tylko z liter i cyfr (bez polskich znaków)';
 }

 if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
 {
 $walidacja = false;
 $_SESSION['email_error'] = 'Wpisz prawidłowy adres email!';
 }

 if($haslo1 != $haslo2)
 {
 $walidacja = false;
 $_SESSION['haslo_error'] = 'Hasła są różne';
 }

//logowanie do bazy
if($walidacja)
{
    require_once('polaczenie.php');

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $poloczenie = new mysqli($host, $user, $password, $name); 
    }catch(mysqli_sql_exception $e)
    {
    $_SESSION['error'] = $e;
    header('Location: index.php');
    exit();
    }

    //sprawdzamy czy podany login już istnieje

    $zapytanie = "SELECT login FROM login WHERE login='$login'";
$wynik = $poloczenie->query($zapytanie);

if($wynik->num_rows > 0)
{
    $_SESSION['login_error'] = 'Login już istnieje wpisz inny';
}
else{
    //login prawidłowy
    //rejestracja uzytkownika

    $zapytanie = "INSERT INTO login VALUE (NULL, '$login', '$haslo1', '$email')";
    if($poloczenie->query($zapytanie))
    {
         //udało sie
        header('Location: index.php');
        $rezultat = $poloczenie->query("SELECT id FROM `login` WHERE login = '$login'");
        //wyciagamy id
        $id = $rezultat->fetch_row()[0];
        
        $rezultat = @$poloczenie->query("INSERT INTO `gracz`(`ID`, `lvl`, `exp`, `zloto`, `dni_vip`, `drewno`, `drewnoPlus`, `zelazo`, `zelazoPlus`, `kamien`, `kamienPlus`, `wojownicy`, `obroncy`, `koszt_ulepszenia`) VALUES ('$id','1','0','100','0','0','1','0','1','0','1','0','0','50')");
          

        
    }
    else{
        //nie udało się
        //jakieś opercajed
    }
    
}

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
</head>
<body>
    <h2>Wpisz dane aby założyć konto: </h2>
    <div class="formularz">

        <form action="rejestracja.php" method="POST">
        <div class="okienko"><input class="log" type="text" name="login" placeholder="Login"></div>
            <div class="error">
                <?php
                if(isset( $_SESSION['login_error']))
                {
                    echo  $_SESSION['login_error'];
                    unset( $_SESSION['login_error']);
                }
                ?>
            </div>
            <div class="okienko"><input class="log" type="email" name="email" placeholder="Email"></div>
            <div class="error">
                <?php
                if(isset( $_SESSION['email_error']))
                {
                    echo  $_SESSION['email_error'];
                    unset( $_SESSION['email_error']);
                }
                ?>
            </div>
            <div class="okienko"><input class="log" type="password" name="haslo1" placeholder="Hsało"></div>
            <div class="okienko"><input class="log" type="password" name="haslo2" placeholder="Powtórz hsało"></div>
            <div class="error">
                <?php
                if(isset( $_SESSION['haslo_error']))
                {
                    echo  $_SESSION['haslo_error'];
                    unset( $_SESSION['haslo_error']);
                }
                ?>
            </div>
            <input class="przycisk1" type="submit" value="Załóż konto" name="zaloz">
        </form>
            </div>
        </body>
</html>