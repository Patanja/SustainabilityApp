<?php
require ("../nav_bar/nav_php.php");
require ("../db_connection.php");


$allowed_keys = ['name', 'surname', 'company_name', 'email', 'password', 'company_logo'];
foreach ($allowed_keys as $key) {
    if (isset($_POST[$key])) {
        $value = $_POST[$key];
        
        // Validation
        if (empty($value)) {
            die("The new value cannot be empty.");
        }

        // Update the user detail in the database
        try {
            $query = "UPDATE business_registrations SET $key = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($link, $query);
            if ($stmt === false) {
                die('Error preparing statement: ' . mysqli_error($link));
            }

            // Bind parameters and execute statement
            mysqli_stmt_bind_param($stmt, "si", $value, $_SESSION['user']['user_id']);
            mysqli_stmt_execute($stmt);
            $_SESSION['update_success'] = true;
            header('Location: profile.php');
            exit(); 
        } catch (Exception $e) {
            die('Error updating user detail: ' . mysqli_error($link));

        }
    }
}
?>