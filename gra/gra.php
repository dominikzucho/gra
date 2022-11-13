<?php
    session_start();
    if(!$_SESSION['login']) header('Location: index.php');
    require_once "polaczenie.php";
    $polaczenie = @new mysqli($host, $user, $password, $name);
    $log = $_SESSION['login'];
    $rezultat = @$polaczenie->query("SELECT * FROM `login` WHERE login = '$log'");
    $_SESSION['id'] = $rezultat->fetch_row()[0];
    $rezultat->free_result();
    $polaczenie->close();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra</title>
    <link rel="stylesheet" href="./skrypty/style.css">
</head>
<body>

<div class="SetNick hidden">
    <form action="./skrypty/setnick.php" method="post">
        <input type="text" name="nick" placeholder="nick">
        <button type="submit">Ustaw</button>
    </form>
    <p class="error">
        <?php if(isset($_SESSION['BusyNickname']))echo $_SESSION['BusyNickname'] ?>
    </p>
</div>

<div class="stats">
    <h4 class="nick"></h4>
    <h4 class="lvl"></h4>
    <h4 class="zloto"></h4>
    <h4 class="dnivip"></h4>
    <h4 class="drewno"></h4>
    <h4 class="zelazo"></h4>
    <h4 class="kamien"></h4>
</div>

<div class="drewnoo" onclick="clickWood()"></div>
<div class="zelazoo" onclick="clickIron()"></div>
<div class="kamienn" onclick="clickStone()"></div>

<div class="handel"><a href="handel.php">Handluj</a></div>

<a href="logout.php" class="wyloguj">wyloguj</a>

<script src="./skrypty/script.js"></script>
</body>
</html>