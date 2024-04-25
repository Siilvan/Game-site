<?php

session_start();
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
}

include_once('connector.php');

$pdo = CONNECT_PDO();
$sql = "SELECT * FROM games WHERE Publisher = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['loggedInUser']]);
$published = $stmt->fetchAll(PDO::FETCH_ASSOC);

$games = [];
$i = 0;

foreach ($published as $PublishedGame) {
    $sql = "SELECT * FROM games WHERE GameID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$PublishedGame['GameID']]);
    $games[$i] = $stmt->fetch(PDO::FETCH_ASSOC);
    $i++;
}

$sql2 = "SELECT * FROM games WHERE GameID = ?";
$stmt2 = $pdo->prepare($sql2);
if (!isset($_GET['game'])) {
    $_GET['game'] = null;
}
$stmt2->execute([$_GET['game']]);
$games2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Almost there</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="library_style.css">
<title>Almost There</title>

</head>
<body>
    <nav>
        <div class="left">
            <a href="published.php" class="active">Published Games</a>
            <a href="publish-new.php">New Game</a>
            <a href="#"><?= $_SESSION['loggedInUser'] ?></a>
        </div>
        <a href="logout.php"><button type="button" class="logout">Logout</button></a> 
    </nav>
    
    <div class="sidebar">
        <?php
        foreach ($games as $game) { 
            if ($game['GameID'] != $_GET['game']) { ?>
                <div style="padding: 5px;">
                    <a href="published.php?game=<?= $game['GameID'] ?>"><strong><?= $game['Title'] ?></strong></a>
                </div>
            <?php } else { ?>
                <div style="padding: 5px;">
                    <a href="published.php?game=<?= $game['GameID'] ?>"><strong class="active"><?= $game['Title'] ?></strong></a>
                </div>
            <?php } 
        } ?>
    </div>
        
<div class="container">
<?php
foreach ($games2 as $game2) {  
    ?>
<div style="width: 60%; height: 500px;  background-color: #334d;">
    <div style="float: left; width: 57%; height: 100%;">
        <img src="./images/<?= $game2['Foto'] ?>" style="height:100%; padding: 10px; ">
    </div>

    <div style="float: left; width: 40%; height: 100%; padding-top: 10px">

        <img src="./images/<?= $game2['Banner'] ?>">
        <p class="smallFont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem praesentium sint assumenda amet neque repellendus delectus laboriosam hic aliquid iste dicta, sapiente ipsum dolore impedit voluptatem at qui.</p>
            <p class="tinyFont">
                RELEASE YEAR: <?= $game2['ReleaseYear'] ?>
                <br>
                PUBLISHER: <?= $game2['Publisher'] ?>
                <br>
                GENRE: <?= $game2['Genre'] ?>
            </p>
            </div>
        </div>
    <?php
}
?>
</div>

</body>
</html>
