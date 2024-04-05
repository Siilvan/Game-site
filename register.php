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
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();
    }
        
        ?>
    <form method="POST">
        <h3>Register Here</h3>
        
        <label for="username">Username</label>
        <input type="text" placeholder="username" id="username" name="username">
        
        <label for="password">Password</label>
        <input type="password" placeholder="password" id="password" name="password">
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
<!-- $wachtwoord = $_POST['password'];

INSERT INTO users (username, password) VALUES ('admin', 'password_hash($wachtwoord, PASSWORD_DEFAULT)'); -->