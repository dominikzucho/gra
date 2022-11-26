<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kopalnia złota</title>
    <link rel="stylesheet" href="./skrypty/style2.css">
    
</head>
<body>
    <section>
    <div class="stats">
        <h4 class="nick"></h4>
        <h4 class="lvl"></h4>
        <h4 class="wojownicy"></h4>
        <h4 class="obroncy"></h4>
        <h4 class="mur"></h4>
        <h4 class="zloto"></h4>
    </div>
    <div class="kup-jednostke">
        <button onclick="show_or_hide('jednostka','rekrutuj-show','rekrutuj-hide')" id="jednostka">Rekrutuj</button>
        <div class="rekrutuj-hide" id="jednostka">
            <div class="obroncy">obrońcy</div>
            <div class="wojownicy">wojownicy</div>
            <button class="x" onclick="show_or_hide('jednostka','rekrutuj-show','rekrutuj-hide')" id="jednostka">x</button>
        </div>
    </div>
    <div class="zlotoo">
        <div class="img-zloto"><img src="./img/wozekidealny2.png"><img src="./img/wozekidealny1.png"></div>
        <div class="za-ile" id="za-ile"></div>
        <div class="zbierz-zloto-hidden" id="zbierz-zloto">
            <form action="./skrypty/zbierzZloto.php" method="post">
                <label for="zbierz">Twoje złoto jest gotowe do zebrania!</label>
                <input type="submit" value="zbierz" id="zbierz">
            </form>
        </div>
        <button onclick="show_or_hide('gornicy','okno-show','okno-hide')" id="gornicy">Wyślij górników</button>
        <div class="okno-hide zbiory-zlota" id="gornicy">
            <div class="gornik-img" style="width: 300px; height:450px"><img src="./img/gornik.png" alt=""></div>
            <div class="koszt-zbioru">drewno2 kamien1</div>
            <div class="zbierz">
                <form action="./skrypty/rekrutujGornikow.php" method="post">
                    <input type="submit" value="zlecenie" class="button">
                </form>
            </div>
            <button onclick="show_or_hide('gornicy','okno-show','okno-hide')" class="x" id="gornicy">x</button>
        </div>
        <img src="./img/zloto.png" class="fall" id="zloto">
    </div>
    </section>
    <script src="./skrypty/script.js"></script>
    <script src="./skrypty/kopalniaZlota.js"></script>
</body>
</html>