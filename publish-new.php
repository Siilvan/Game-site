<?php

session_start();
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
}

include_once('connector.php');

$pdo = CONNECT_PDO();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && isset($_FILES["banner"]) && $_FILES["banner"]["error"] == 0 && $_FILES["image"]["error"] == 0) {
    $target_dir = "images/"; 
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["banner"]["name"]);
    $image= basename($_FILES["image"]["name"]);
    $banner= basename($_FILES["banner"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file2)) {
        $image_location = $target_file;


        $sql = "INSERT INTO games (Title, Genre, ReleaseYear, Publisher, InGamePurchases, Foto, Banner) VALUES  (:title, :Genre, :Year, :Publisher, :igp, :image_location, :banner)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $_POST['Title']);
        $stmt->bindParam(':Year', $_POST['Year']);
        $stmt->bindParam(':Genre', $_POST['Genre']);    
        $stmt->bindParam(':Publisher', $_POST['Publisher']);
        $stmt->bindParam(':igp', $_POST['igp']); 
        $stmt->bindParam(':image_location', $image);
        $stmt->bindParam(':banner', $banner);
        $stmt->execute();
    }
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
<link rel="stylesheet" href="publish.css">
<title>Almost There</title>

</head>
<body>
<nav>
    <div class="left">
        <a href="published.php" >Published Games</a>
        <a href="publish-new.php" class="active">New Game</a>
        <a href="#"><?= $_SESSION['loggedInUser'] ?></a>
    </div>
    <a href="logout.php"><button type="button" class="logout">Logout</button></a> 
</nav>


<form method="POST" enctype="multipart/form-data">
    <h3>Publish</h3>
        
    <label for="Title">Title</label>
    <input type="text" id="Title" name="Title" class="input">
        
    <label for="Genre">Genre</label>
    <input type="text" id="Genre" name="Genre" class="input">

    <label for="price">Price</label>
    <input type="number" id="price" name="price" step=".01" class="input">

    <input type="hidden" name="Year" id="Year" value="<?= date('Y'); ?>">
    <input type="hidden" name="Publisher" id="Publisher" value="<?= $_SESSION['loggedInUser']; ?>">
    <br>
<div class="igv">
    <p>In Game Purchases?</p>
    <input type="radio" id="ja" name="igp" value="ja" />
    <label for="ja">Ja</label>
        
    <input type="radio" id="nee" name="igp" value="nee" />
    <label for="nee">Nee</label>
</div>
    <p style="display: flex; margin-bottom: 10px; justify-content: center; font-size: 20px"><strong>cover art & banner</strong></p>
    <input type="file" name="image" id="image" class="hidden">
    <label for="image" class="register">Select your cover art</label>

    <input type="file" name="banner" id="banner" class="hidden">Select your banner</label>">
    <label for="banner" class="register">Select your banner</label>
    <br>

    <button type="submit" value="Upload Image" class="register" style="font-weight: 600; font-size: 20px;">Publish</button>

    </form>
