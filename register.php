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
        if (isset($_POST['role'])) {
            $role = 'admin';
            $username = $_POST['username'];
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
        } else {
            $role = 'user';
            $username = $_POST['username'];
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
        }
    }
        
    ?>
    <form method="POST">
        <h3>Register Here</h3>
        
        <label for="username">Username</label>
        <input type="text" placeholder="enter your username.." id="username" name="username" class="input">
        
        <label for="password">Password</label>
        <input type="password" placeholder="enter your password.." id="password" name="password" class="input" />

        <input type="checkbox" id="role" name="role" value="admin"/>

        <button type="submit">Register</button>
    </form>
</body>
</html>
