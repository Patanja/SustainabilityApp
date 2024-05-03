<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/SustainabilityApp/nav_bar/nav.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    <nav>
    <a href="../Home_page/home_page.php">
    <img src="/SustainabilityApp/logo.png" alt="Logo" id="logo">
    </a>
<?php if (!isset($_SESSION['user_id'])): ?> 
    <a href="../home_page/home_page.php#about">About</a>
    <a href="../Green_calculator/calculator_info.php#Green Calculator">Green calculator</a>



<?php endif; ?>

        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="../Green_calculator/gc.php"> Green Calculator</a>

     
            <a href="../profile/profile.php">Profile</a>
            <a href="../logout.php">Logout</a>
        <?php else: ?>
            <a href="../login/login_main.php">login</a>

        <?php endif; ?>
    </nav>
    </body>
</html>
   