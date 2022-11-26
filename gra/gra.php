<?php
    session_start();
    if(!$_SESSION['login']) header('Location: index.php');
    require_once "polaczenie.php";
    $polaczenie = @new mysqli($host, $user, $password, $name);
    $log = $_SESSION['login'];
    $rezultat = @$polaczenie->query("SELECT * FROM `login` WHERE login = '$log'");
    $_SESSION['id'] = $rezultat->fetch_row()[0];
    $id = $_SESSION['id'];
    $rezultat->free_result();
    $rezultat = @$polaczenie->query("SELECT * FROM `gracz` WHERE ID = '$id'");
    $_SESSION['nick'] = $rezultat->fetch_row()[1];
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
</head>
<body class="glowne_body">

    
<div class="wszystko">
<div id="nick" class="SetNick hidden">
    <div class="zawartosc">
    <div class="napis">
    <h1>Witaj podróżniku!</h1>
    </div>
    <div class="napis2">
        <h2>Aby wejść do wioski ptorzebujesz specjalnego zaproszenia. Aby takowe otrzymać musimy widzieć jak się do ciebie zwracać, dlatego ustaw swój NICK.</h2>
    </div>
    <div class="ustawnick">
    <form action="./skrypty/setnick.php" method="post">
        <input class="log" type="text" name="nick" placeholder="nick">
        <button  class="przycisk1" type="submit">Ustaw</button>
    </form>
    <p class="error">
        <?php if(isset($_SESSION['BusyNickname']))echo $_SESSION['BusyNickname'] ?>
    </p>
    </div>
    </div>
</div>

<div class="statstlo">
<div class="stats">
    <div class="staty"><h4 class="nick"></h4></div>
    <div class="staty"><h4 class="lvl"></h4></div>
    <div class="obrazek">O</div> 
    <div class="staty"><h4 class="zloto"></h4></div>
    <div class="obrazek">O</div>
    <div class="staty"><h4 class="dnivip"></h4></div>
    <div class="obrazek">O</div>
    <div class="staty"><div class="odrewno"><img class ="img" src="./img/drewno_ikona.png" alt=""></div><h4 class="drewno"></h4></div>
    <div class="obrazek">O</div>
    <div class="staty"><div class="odrewno"><img class ="img" src="./img/zelazo_ikona.png" alt=""></div><h4 class="zelazo"></h4></div>
    <div class="obrazek">O</div>
    <div class="staty"><div class="odrewno"><img class ="img" src="./img/kamien_ikona.png" alt=""></div><h4 class="kamien"></h4></div>

</div>
</div>

<div class="ulepszenia">
    <h4>Koszt:</h4>
<form action="skrypty/ulepszenie_wood.php" method="POST">
    <input class="przycisk2" type="submit" name="update_wood" value="drzewo">
</form>
<form action="skrypty/ulepszenie_stone.php" method="POST">
    <input class="przycisk2" type="submit" name="update_wood" value="kamien">
</form>
<form action="skrypty/ulepszenie_iron.php" method="POST">
    <input class="przycisk2" type="submit" name="update_wood" value="zelazo">
</form>
</div>
<div class="tlowioska">



<!-- <div class="przejscia">
<div class="las">
    <a href="las.php">IDŹ DO LASU</a>
</div> -->
<div class="przejscia">
<div class="las">
        <button class="przycisk" onclick="show_or_hide('okno1','okno1-show','okno1-hide')" id="okno1">LAS</button>
        <div class="okno1-hide" id="okno1">
            <div class="drzewo">
  
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra</title>
    <link rel="stylesheet" href="./skrypty/style.css">
</head>
<body class="las_body">
<div class="wszystko">
<div class="SetNick hidden">
    <form action="./skrypty/setnick.php" method="post">
        <input type="text" name="nick" placeholder="nick">
        <button type="submit">Ustaw</button>
    </form>
    <p class="error">
        <?php if(isset($_SESSION['BusyNickname']))echo $_SESSION['BusyNickname'] ?>
    </p>
</div>
<div class="ikona_dreno">
    <div class="drewnoo" onclick="clickWood()"></div>
</div>


</div>

<script src="./skrypty/script.js"></script>
</div>
            <button class="x" onclick="show_or_hide('okno1','okno1-show','okno1-hide')" id="okno1">x</button>
        </div>
    </div>

<!-- <div class="kopalnia">
    <a href="kopalnia.php">IDŹ DO KOPALNI</a>
</div> -->

<div class="kopalnia">
        <button class="przycisk" onclick="show_or_hide('okno2','okno2-show','okno2-hide')" id="okno2">KOPALNIA</button>
        <div class="okno2-hide" id="okno2">
            <div class="kamien">

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra</title>
    <link rel="stylesheet" href="./skrypty/style.css">
</head>
<body class="kopalnia_body">
<div class="wszystko">
<div class="SetNick hidden">
    <form action="./skrypty/setnick.php" method="post">
        <input type="text" name="nick" placeholder="nick">
        <button type="submit">Ustaw</button>
    </form>
    <p class="error">
        <?php if(isset($_SESSION['BusyNickname']))echo $_SESSION['BusyNickname'] ?>
    </p>
</div>

<div class="ikona_kamien">
<div class="kamienn" onclick="clickStone()"></div>
</div>

</div>

<script src="./skrypty/script.js"></script>
            </div>
            <button class="x" onclick="show_or_hide('okno2','okno2-show','okno2-hide')" id="okno2">x</button>
        </div>
    </div>

<!-- <div class="kopalnia">
    <a href="kowal.php">IDŹ DO KOWALA</a>
</div> -->

<div class="kowal">
        <button class="przycisk" onclick="show_or_hide('okno3','okno3-show','okno3-hide')" id="okno3">KOWAL</button>
        <div class="okno3-hide" id="okno3">
            <div class="zelazo">

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra</title>
    <link rel="stylesheet" href="./skrypty/style.css">
</head>
<body class="kowal_body">
<div class="wszystko">
<div class="SetNick hidden">
    <form action="./skrypty/setnick.php" method="post">
        <input type="text" name="nick" placeholder="nick">
        <button type="submit">Ustaw</button>
    </form>
    <p class="error">
        <?php if(isset($_SESSION['BusyNickname']))echo $_SESSION['BusyNickname'] ?>
    </p>
</div>


<div class="ikona_zelazo">
<div class="zelazoo" onclick="clickIron()"></div>
</div>

</div>


<script src="./skrypty/script.js"></script>
            </div>
            <button class="x" onclick="show_or_hide('okno3','okno3-show','okno3-hide')" id="okno3">x</button>
        </div>
    </div>
</div>

<div class="przejscia2">

<div class="przycisk"><a class="handluj" href="handel.php">Handluj</a></div>

<div class="przycisk"><a class="zloto1" href="zloto.php">kopalnia złota</a></div>

<a class="przycisk" href="logout.php" class="wyloguj">wyloguj</a>
</div>
</div>

<script src="./skrypty/script.js"></script>

</div>
</body>
</html>