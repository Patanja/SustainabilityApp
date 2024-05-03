<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<?php

require ("../nav_bar/nav_php.php");

// Check if the user is signed in
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    foreach($user as $key => $value) {
        if ($key == 'name') {
            echo '<form action="update_user_detail.php" method="post">';
            echo '<label for="' . $key . '-input">' . ucfirst($key) . ':</label>';
            echo '<input type="text" id="' . $key . '-input" name="value" value="' . htmlspecialchars($value) . '">';
            echo '<input type="hidden" name="key" value="' . $key . '">';
            echo '<input type="submit" value="Update">';
            echo '</form>';
        }
    }
}
?>
</body>
</html>