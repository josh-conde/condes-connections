<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/utility.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
    <title>Admin Login</title>
</head>
<body>
    <nav class="navbar" id="home">
        <div class="nav" >
            <a href="index.html#home"><img src="img/logo_transparent_header.png" alt="Logo Header"></a>
            <a href="index.html#services">Services</a>
            <a href="index.html#about">About</a>
            <a href="index.html#contact">Contact</a>
        </div>
    </nav>
    <div class="hero container">
        <form method="POST" action="admin_authenticate.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <img class="fade-in" src="img/logo_transparent.png" alt="Conde's Connections Logo">
    </div>

</body>
</html>