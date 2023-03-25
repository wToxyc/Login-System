<?php
session_start();

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $db = new PDO('mysql:host=localhost;dbname=login_system', 'root', '');

    $sql = "SELECT * FROM users where email = '$email' ";
    $result = $db->prepare($sql);
    $result->execute();

    if ($result->rowCount() > 0) {
        echo "<center><h1>Failed to register!</h1></center>";
        return;
    }

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    $result = $db->prepare($sql);
    $result->execute();

    if ($result->rowCount() > 0) {
        echo "<center><h1>Successfully registered!</h1></center>";
        $_SESSION['email'] = $email;
    } else {
        echo "<center><h1>Failed to register!</h1></center>";
    }
}

?>