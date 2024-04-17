<?php

session_start();
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
}

include_once('connector.php');

$pdo = CONNECT_PDO();
$sql = "SELECT * FROM games WHERE GameId = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['game']]);
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="detail_style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdn.tailwindcss.com"></script>

        <nav>
            <div class="left">
                <a class="active" href="indexa.php">Home</a>
                <a href="#">Library</a>
                <a><?= $_SESSION['loggedInUser'] ?></a>
            </div>
        </nav>
    </head>
    
<body>
    <div class="container" style="width: 60%; height: 470px;  background-color: #0e151d;">
        <div style="float: left; width: 60%; height: 100%;">
    </div>

        <div id="game-highlight" style="display: inline-block; width: 40%; height: 100%; padding-left: 1%;">
            <img class="game_header_image_full" src="../../ImageData/mk11.jpg">

                <p class="tinyFont">
                    RELEASE YEAR:                <?= $games[0]['ReleaseYear'] ?>
                    <br>
                    Publisher:                   <?= $games[0]['Publisher'] ?>
                </p>
            </p>
        </div>
        </div>

        <div class="container" id="game-price" style="
        width: 60%; height: 80px; background-image: linear-gradient(to right, rgb(45, 61, 74) , rgb(87, 101, 116));">
            <div class="smallFont" style="display: inline-block; font-weight: 600; font-size: 20px; padding-left: 5px; margin-top: 25px;">
                Purchase <?= $games[0]['Title'] ?>
            </div>
            
            <div id="price" style="background-color: black; float: right; padding: 5px; margin-top: 20px;">
                    <span style="color: #c5d3de; position: relative; top: 8px; padding-right: 12px;">€ <?= $games[0]['Price'] ?> </span>

                <div id="btn-buy" style="float: right;">
                  <a href="../Checkout/checkout2.html">
                    <button type="button" class="btn btn-success"><span>Buy Game</span></button>
                  </a>
                </div>
            </div>
        </div>
        </div>
    </body>

</html>
