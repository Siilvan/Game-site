<?php

session_start();
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
}

include_once('connector.php');

$pdo = CONNECT_PDO();
$sql = "SELECT * FROM games WHERE GameID = ?";
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
    <?php

    foreach($games as $game) {

    ?>
    <div class="container" style="width: 55%; height: 470px;  background-color: #0e151d;">
        <div style="float: left; width: 60%; height: 100%;">
            <img src="./images/<?= $game['Foto'] ?>" style="height:100%; padding: 10px; padding-left: 10px;">
    </div>

        <div style="float: left; width: 40%; height: 100%; padding-top: 10px">

            <img src="./images/<?= $game['Banner'] ?>">
            <p class="smallFont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem praesentium sint assumenda amet neque repellendus delectus laboriosam hic aliquid iste dicta, sapiente ipsum dolore impedit voluptatem at qui.</p>
                <p class="tinyFont">
                    RELEASE YEAR: <?= $game['ReleaseYear'] ?>
                    <br>
                    PUBLISHER: <?= $game['Publisher'] ?>
                    <br>
                    GENRE: <?= $game['Genre'] ?>
                </p>
        </div>
        </div>

        <div class="container" id="game-price" style="width: 55%; height: 80px; background-image: linear-gradient(to right, rgb(45, 61, 74) , rgb(87, 101, 116));">
            <div class="smallFont" style="display: inline-block; font-weight: 600; font-size: 20px; padding-left: 5px; margin-top: 25px;">
                Purchase <?= $game['Title'] ?>
            </div>
            
            <div id="price" style="background-color: black; float: right; padding: 5px; margin-top: 20px;">
                    <span style="color: #c5d3de; position: relative; top: 8px; padding-right: 12px;">
                    <?php if($game['Price'] == 0.0) {
                        echo "Free"; ?></span>
                    <?php } else { ?>
                        € <?= $game['Price'] ?> </span> 
                    <?php } ?>

                <div style="float: right;">
                  <a href="../Checkout/checkout2.html">
                      <button type="button" class="btn btn-success"><span>Buy Game</span></button>
                    </div>
                  </a>
            </div>
        </div>
        </div>
        <?php
        }
        ?>
    </body>

</html>
