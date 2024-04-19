<?php

session_start();
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
}

include_once('connector.php');

$pdo = CONNECT_PDO();
$sql = "SELECT * FROM winkelwagen WHERE UserID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['loggedInUserId']]);
$cart = $stmt->fetchAll(PDO::FETCH_ASSOC);

$games = [];
$i = 0;

foreach ($cart as $item) {
    $sql = "SELECT * FROM games WHERE GameID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$item['GameID']]);
    $games[$i] = $stmt->fetch(PDO::FETCH_ASSOC);
    $i++;
}

IF ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = 'DELETE FROM winkelwagen WHERE GameID = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['game']]);
    header('Location: cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Almost there</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="home_style.css">
<title>Steam Cart</title>

</head>
<body>
<nav>
    <div class="left">
        <a href="indexa.php">Store</a>
        <a href="#">Library</a>
        <a href="cart.php" class="active">Cart</a>
        <a href="#"><?= $_SESSION['loggedInUser'] ?></a>
    </div>
    <a href="logout.php"><button type="button" class="logout">Logout</button></a>

</nav>
    <main>
    <div class="mx-auto px-8 py-8 max-w-3xl backdrop-blur border-solid border border-gray-300 rounded-t-lg shadow-2xl cart-center">
        <?php
        foreach ($games as $game) {
            ?>
            <div class="cart-item flex justify-between">
                <div class="flex items-center">
                <img src="./images/<?= $game['Foto'] ?>">
                <div class="item-details">
                    <h2><?= $game['Title'] ?></h2>
                    <p>Price: € <?= $game['Price'] ?></p>
                </div>
                </div>
                <form method="POST" style="display: inline-block;">
                    <input type="hidden" name="game" value="<?= $game['GameID'] ?>">
                    <button type="submit" class="logout">remove</button>
                </form>
            </div>
            <?php
        }
        ?>
    </div>

        <div class="holder mx-auto px-8 py-8 max-w-3xl rounded-b-lg">
            <h2>Estimated Total: $19.99</h2>
            <form method="POST" style="display: flex; float: right;">
                    <button type="submit" class="btn btn-success">a</button>
                </form>
        </div>
    </main>
</body>
</html>
