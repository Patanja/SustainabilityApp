

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
<link rel="stylesheet" href="reg_styles.css">
</head>
<body>

<?php
require ("../nav_bar/nav_php.php");
require "reg_main.php";
 ?>

<body>
    <form action="reg_main.php" method="post" enctype="multipart/form-data">
        <label for="name">First Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="surname">Last Name:</label><br>
        <input type="text" id="surname" name="surname"><br>
        <label for="company_name">Company Name:</label><br>
        <input type="text" id="company_name" name="company_name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="pass1">Password:</label><br>
        <input type="password" id="pass1" name="pass1"><br>
        <label for="pass2">Confirm Password:</label><br>
        <input type="password" id="pass2" name="pass2"><br>
        <label for="company_logo">Upload Logo:</label><br>
        <div id="drop_zone">Drop files here</div>
        <input type="file" id="company_logo" name="company_logo"><br>
        <input type="submit" value="Register" class="button-common">
    </form>
    <script src="dragAndDrop.js"></script>
</body>

</html>