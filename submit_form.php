
<?php

$db = new PDO('sqlite:contacts.db');
$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name    = htmlspecialchars($_POST['first_name']);
    $last_name     = htmlspecialchars($_POST['last_name']);
    $email         = htmlspecialchars($_POST['email']);
    $phone         = htmlspecialchars($_POST['phone']);
    $message       = htmlspecialchars($_POST['message']);
    $business_type = htmlspecialchars($_POST['business_type']);

    $stmt = $db->prepare("SELECT COUNT(*) FROM contact_form WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $emailCount = $stmt->fetchColumn();

    if ($emailCount > 0) {
        $message = "Oops! Looks like we already have a submission with that email. We promise to get back to you!";
    } else {
        $stmt = $db->prepare("INSERT INTO contact_form (first_name, last_name, email, phone, message, business_type)
                              VALUES (:first_name, :last_name, :email, :phone, :message, :business_type)");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':business_type', $business_type);

        if ($stmt->execute()) {
            $message = "Form submitted successfully!";
        } else {
            $message = "Error submitting form.";
        }
    }
}
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

    <div class="hero container">
        <img class="fade-in" src="img/logo_transparent.png" alt="Conde's Connections Logo">
        <p id="form-message"><?php echo $message; ?></p>
        <button><a href="index.html">Return to Home Page</a></button>
    </div>
</body>

<div class="spacer"></div>

<footer>
    <a href="admin_login.php"><i class="fa-solid fa-user-tie fa-xl"></i> Admin</a>
</footer>
</html>