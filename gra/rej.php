<?php
session_start();
require_once "polaczenie.php";
$polaczenie = @new mysqli($host, $user, $password, $name);
if($polaczenie->connect_errno!=0)
{
    echo "Error: ",$polaczenie->connect_errno;
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $mail = $_POST['email'];

    $rezultat = @$polaczenie->query("SELECT * FROM `login` WHERE login='$login'");
    if($rezultat->num_rows==0)
    {
        $blogin = 0;
    }
    else
    {
        $blogin = 1;
        //...
    }
    $rezultat = @$polaczenie->query("SELECT * FROM `login` WHERE email='$mail'");
    if($rezultat->num_rows==0)
    {
        $bmail = 0;
    }
    else
    {
        $bmail = 1;
        //...
    }
    
    if($blogin == 0 && $bmail == 0)
    {
        unset($_SESSION['blad1']);
        $rezultat = @$polaczenie->query("INSERT INTO `login`(`login`, `haslo`, `email`) VALUES ('$login','$haslo','$mail')");
        header('Location: index.php');
    }
    if($blogin == 1 && $bmail == 0)
    {
        //login zle mail git
        $_SESSION['blad1'] = '<span style=color:red> Login zajęty</span>';
        header('Location: rejestracja.php');
    }
    if($blogin == 0 && $bmail == 1)
    {
        //login git mail zle
        $_SESSION['blad1'] = '<span style=color:red> Ten adres email jest już używany</span>';
        header('Location: rejestracja.php');
    }
    if($blogin == 1 && $bmail == 1)
    {
        //zle wszystko
        $_SESSION['blad1'] = '<span style=color:red> Takie konto już istnieje</span>';
        header('Location: rejestracja.php');
    }  

    //przypisanie wszystkiego
    //id
    {

    //pytamy baze o id usere $login
    $rezultat = @$polaczenie->query("SELECT id FROM `login` WHERE login = '$login'");
    //wyciagamy id
    $id = $rezultat->fetch_row()[0];
    }
    $rezultat = @$polaczenie->query("INSERT INTO `gracz`(`ID`, `lvl`, `exp`, `zloto`, `dni_vip`, `drewno`, `drewnoPlus`, `zelazo`, `zelazoPlus`, `kamien`, `kamienPlus`, `wojownicy`, `obroncy`, `mur`) VALUES ('$id','1','0','100','0','0','1','0','1','0','1','0','0','0')");

    $polaczenie->close();      
}
?>