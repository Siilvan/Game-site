<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            background-color: #f1f1f1;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            flex: 0 0 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        .sidebar a {
            color: #fff;
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .game {
            flex-basis: calc(33.33% - 10px);
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .game img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .game h2 {
            margin: 0 0 10px;
        }

        .game p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Library</a>
        <a href="#">Store</a>
        <a href="#">Community</a>
        <a href="#">Profile</a>
    </div>
    <div class="container">
        <div class="sidebar">
            <a href="#">Portal</a>
            <a href="#">Half-Life 2</a>
            <a href="#">Dota 2</a>
            <a href="#">Counter-Strike: Global Offensive</a>
        </div>
        <div class="content">
            <div class="game">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/221410/capsule_184x69.jpg?t=1635577862" alt="Game 1">
                <h2>Portal</h2>
                <p>First-person puzzle-platform video game developed and published by Valve Corporation.</p>
            </div>
            <div class="game">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/400/capsule_184x69.jpg?t=1635577862" alt="Game 2">
                <h2>Half-Life 2</h2>
                <p>First-person shooter video game developed by Valve Corporation. It is the sequel to 1998's Half-Life.</p>
            </div>
            <div class="game">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/570/capsule_184x69.jpg?t=1635577862" alt="Game 3">
                <h2>Dota 2</h2>
                <p>Multiplayer online battle arena video game developed and published by Valve Corporation.</p>
            </div>
            <div class="game">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/730/capsule_184x69.jpg?t=1635577862" alt="Game 4">
                <h2>Counter-Strike: Global Offensive</h2>
                <p>Multiplayer first-person shooter video game developed by Valve Corporation and Hidden Path Entertainment.</p>
            </div>
        </div>
    </div>
</body>
</html>