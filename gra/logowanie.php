<?php
    session_start();
?>
<?php
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
    $_SESSION['login'] = $login;

    if($rezultat = @$polaczenie->query(
        "SELECT * FROM `login` WHERE login='$login' AND haslo='$haslo'"))
        {
            $ile_userow = $rezultat->num_rows;
            if($ile_userow>0)
            {
                unset($_SESSION['blad']);
                $rezultat->free_result();
                header('Location: gra.php');
            }
            else
            {
                $_SESSION['blad'] = '<br><br><span style="color:red">Nieprawidlowe haslo lub login</span>';
                header('Location: index.php');
                echo "a";
            }

        }else{
            
            $_SESSION['blad'] = '<br><br><span style="color:red">Nieprawidlowe haslo lub login</span>';
            echo "b";
            // header('Location: index.php');
        }

}
?>