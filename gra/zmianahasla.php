<?php
session_start();
?>

<?php
// weryfikacja pól lzmiany
if(isset($_POST['haslo']))
{
    if(empty($_POST['haslo']) || empty($_POST['haslo1']) || empty($_POST['haslo2']))
    {
        $_SESSION['blad'] = 'Nic nie wpisałeś!';
        header('location: zmianahasla.php');
        exit();
    }
}
?>

<?php
if(isset($_POST['haslo']) && isset($_POST['haslo1']) && isset($_POST['haslo2']))
{
    $haslo = $_POST['haslo'];
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    $walidacja = true;

    if($haslo1 != $haslo2)
    {
        $walidacja = false;
        $_SESSION['haslo1_error'] = 'Hasła nie są takie same!';
    }

    if($haslo == $haslo1)
    {
        $walidacja = false;
        $_SESSION['haslo_error'] = 'Nowe hasło nie może być takie samo jak stare!';
    }

    if($walidacja)
    {
            // proces łączenia z bazą danych i obsługa logowania
require_once('polaczenie.php');
mysqli_report(MYSQLI_REPORT_STRICT);
try{
    $poloczenie = new mysqli($host, $user, $password, $name); 
}catch(mysqli_sql_exception $e)
{
$_SESSION['blond'] = $e;
header('Location: zmianahasla.php');
exit();
}

// udało sie połączyć z bazą danych

// weryfikacja hasła
$zapytanie = "SELECT haslo FROM login WHERE haslo='$haslo'";
$wynik = $poloczenie->query($zapytanie);

if($wynik->num_rows == 1)
{
    $zapytanie = "UPDATE `login` SET `haslo`='$haslo1' WHERE haslo = '$haslo'";
    $wynik = $poloczenie->query($zapytanie);
    header('Location: logout.php');
    exit();
}
else{
    $_SESSION['blad'] = 'Błędne hasło';
    header('Location: zmianahasla.php');
exit();
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
    <title>Zmiana</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./skrypty/style_index.css">
</head>
<body>
<h1 class="tytul">ZMIANA HASŁA</h1>
    <div class="formularz">
    <form action="zmianahasla.php" method="POST">
    <div class="okienko"><input class="log" type="password" name="haslo" placeholder="Podaj stare hasło"></div>
    <div class="okienko"><input class="log" type="password" name="haslo1" placeholder="Podaj nowe hasło"></div>
    <div class="okienko"><input class="log" type="password" name="haslo2" placeholder="Powtórz nowe hasło"></div>
    <input class="log1" type="submit" name="zmien" value="Zmień"><br>
    
    <?php
    if(isset( $_SESSION['haslo1_error']))
        {
            echo  $_SESSION['haslo1_error'];
            unset( $_SESSION['haslo1_error']);
        }
    ?>
    <?php
    if(isset( $_SESSION['haslo_error']))
        {
            echo  $_SESSION['haslo_error'];
                    unset( $_SESSION['haslo_error']);
        }
    ?>
    </div>
    </form>
</body>
</html>
