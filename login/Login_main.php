<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
require ("../nav_bar/nav_php.php");
 ?>
    <form action="login_tools.php" method="post">
        <label for="company_name">Company Name:</label><br>
        <input type="text" id="company_name" name="company_name" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Log in" class="button-common">
        <p>Not yet a member? <a href="../registration/registration.php">Register</a></p> 
    </form>

    
</body>
</html> 