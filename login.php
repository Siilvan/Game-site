<!DOCTYPE html>
<html>
<head>
    <title>Almost there</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    include_once('connector.php');
    session_start();
    try {
        $pdo = CONNECT_PDO();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    unset($_SESSION['error']);

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['loggedInUser'] = $user['id'];
                header("Location: indexa.php");
                die();
            } else {
                $_SESSION['error'] = "wachtwoord is ongeldig.";
            }
        } else {
            $_SESSION['error'] = "Gebruiker bestaat niet.";
        }
    }
    ?>
    <form method="POST">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Username" id="username" name="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <button type="submit">Log In</button>
       
        <?php if (isset($_SESSION['error'])) : ?>
            <p class="error"><?php echo $_SESSION['error']; ?></p>
        <?php endif; ?>

        <a href="register.php"><button type="button" >Register</button></a>
    </form>


</body>
</html>



