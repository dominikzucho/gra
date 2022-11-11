<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra</title>
</head>
<body>
    <form action="rej.php" method="POST">
        <h1>Rejestracja</h1>
        <label for="login">login:</label><br>
        <input type="text" name="login" ><br>
        <label for="haslo">haslo:</label><br>
        <input type="password" name="haslo"><br>
        <label for="email">email:</label><br>
        <input type="email" name="email"><br><br>
        <input type="submit" value="Gotowe!" class="przycisk" />
    </form>
    <?php 
    if(isset($_SESSION['blad1'])) echo $_SESSION['blad1']; 
    ?>
</body>
</html>