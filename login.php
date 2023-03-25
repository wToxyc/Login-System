<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new PDO('mysql:host=localhost;dbname=login_system', 'root', '');

    $sql = "SELECT * from users where email = '$email' ";
    $result = $db->prepare($sql);
    $result->execute();

    if ($result->rowCount() > 0) {
        $data = $result->fetchAll();
        if (password_verify($password, $data[0]["password"])) {
            echo "<center><h1>Successfully logged in!</h1></center>";
            $_SESSION['email'] = $email;
        } else {
            echo "<center><h1>Failed to log in!</h1></center>";
        }
    } else {
        echo "<center><h1>Failed to login!</h1></center>";
    }
}

?>