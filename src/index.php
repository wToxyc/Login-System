<?php session_start(); ?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="favicon.ico" href="#">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login System</title>
</head>

<body>
    <?php

    if (isset($_SESSION['email'])) {
        echo "<center><h1>You are logged in as: " . $_SESSION['email'] . "</h1></center>";
    } else {
        ?>

    <div>
        <h1>Login</h1>
        <form method="POST" action="login.php">
            <input class="text-field" type="email" id="email" name="email" placeholder="E-mail" required>
            <input class="text-field" type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" id="login" name="login" value="Login">
            <label>Not a member yet?</label>
            <a href="signup.php">Signup</a>
        </form>
    </div>

    <?php
    }

    ?>
</body>

</html>