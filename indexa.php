<?php

session_start();
if (!isset($_SESSION['loggedInUser'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Almost there</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    werkt dit?
</body>
</html>
