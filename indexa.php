<?php

session_start();
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
}

include_once('connector.php');

$pdo = CONNECT_PDO();
$sql = "SELECT * FROM games";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Almost there</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="home_style.css">

</head>
<body>
<nav>
<ul>
  <li><a class="active" href="indexa.php">Home</a></li>
  <li><a href="#">Library</a></li>
  <li><a href="#"><?= $_SESSION['loggedInUser']  ?></a></li>
  <li class="search-container">
    <div>
        <form action="indexa.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit" value="hoi"></button>
        </form>
      </div>
  </li>

</ul>
</nav>
<div class="mx-auto my-auto px-8 py-8 max-w-5xl backdrop-blur border-solid border border-gray-300 rounded-lg shadow-2xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <?php foreach ($games as $game) : ?>
        <div class="card flex flex-col justify-between">
        <h2><strong><?= $game['Title'] ?></strong></h2>
        <img src="images/<?= $game['Foto'] ?>" alt="<?= $game['Title'] ?>" >
        </div>
    <?php endforeach; ?>    
</div>
</div>
</body>
</html>
