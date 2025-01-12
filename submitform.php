<?php

$db = new PDO('sqlite:contacts.db');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name    = htmlspecialchars($_POST['first_name']);
    $last_name     = htmlspecialchars($_POST['last_name']);
    $email         = htmlspecialchars($_POST['email']);
    $phone         = htmlspecialchars($_POST['phone']);
    $message       = htmlspecialchars($_POST['message']);
    $business_type = htmlspecialchars($_POST['business_type']);

    $stmt = $db->prepare("INSERT INTO contact_form (first_name, last_name, email, phone, message, business_type)
                          VALUES (:first_name, :last_name, :email, :phone, :message, :business_type)");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':business_type', $business_type);

    if ($stmt->execute()) {
        echo "Form submitted successfully!";
    } else {
        echo "Error submitting form.";
    }
}
?>