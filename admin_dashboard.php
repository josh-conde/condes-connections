<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

$db = new PDO('sqlite:contacts.db');


$query  = "SELECT * FROM contact_form ORDER BY submitted_at DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/utility.css">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
    <title>Admin Dashboard</title>
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

    <h1>Contact Form Submissions</h1>

    <div class="contact-table">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Business Type</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result): ?>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                            <td><?php echo htmlspecialchars($row['business_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['submitted_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No submissions found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
<div class="spacer"></div>
<footer>
    <a href="logout.php">Logout</a>
</footer>
</html>