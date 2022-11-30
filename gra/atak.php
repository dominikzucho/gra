<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atak</title>
    <link rel="stylesheet" href="./skrypty/atak.css">
</head>
<body>
    <div id="rozpocznij-bitwe">
        <div>czy jesteś gotowy na bitwe?</div><br>
        <button class="rozpocznij-bitwe-button" onclick="start()">atakuj</button>
    </div>

    

    <div id="wrog" onclick="uderzenie()"></div>
    <div id="czas">10s</div>
    <div id="progres">
        <div id="pasek"></div>
        <div id="wytrzymalosc"></div>
    </div>
    
    <div id="notifications"></div>
    
    <script src="./skrypty/script.js"></script>
    <script src="./skrypty/atak.js"></script>
</body>
</html>