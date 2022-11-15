<?php
session_start();
?>

<?php
// weryfikacja pól logowania
if(isset($_POST['login']))
{
    if(empty($_POST['login']) || empty($_POST['haslo']))
    {
        $_SESSION['blad'] = 'Wpisz login i hasło';
        header('location: index.php');
        exit();
    }
}
?>

<?php
$login = $_POST['login'];
$haslo = $_POST['haslo'];

// proces łączenia z bazą danych i obsługa logowania
require_once('polaczenie.php');

mysqli_report(MYSQLI_REPORT_STRICT);
try{
    $poloczenie = new mysqli($host, $user, $password, $name); 
}catch(mysqli_sql_exception $e)
{
$_SESSION['blond'] = $e;
header('Location: index.php');
exit();
}

// udało sie połączyć z bazą danych

// zabezpieczenie
$login = htmlentities($login);
$haslo = htmlentities($haslo);
$login = $poloczenie->real_escape_string($login);
$haslo = $poloczenie->real_escape_string($haslo);

// weryfikacja loginu
$zapytanie = "SELECT login FROM login WHERE login='$login'";
$wynik = $poloczenie->query($zapytanie);

// sprawdzamy czy baza zwróci dokładnie 1 rekord 

if($wynik->num_rows == 1)
{
    //weryfikacja hasla
    $zapytanie = "SELECT haslo FROM login WHERE login='$login'";
    $wynik = $poloczenie->query($zapytanie);
    $rekord = $wynik->fetch_assoc();

    if($rekord['haslo'] == $haslo)
    {
        $_SESSION['login'] = $login;
    header('Location: gra.php');
    }
    else{
        $_SESSION['blad'] = 'Nieprawidłowe hasło!';
        header('location: index.php');
        exit();
    }

    $_SESSION['login'] = $login;
    header('Location: gra.php');
}
else 
{
    $_SESSION['blad'] = 'Błędny login';
    header('Location: index.php');
    exit();
}

?>