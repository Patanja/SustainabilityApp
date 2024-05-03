<?php
require ("../nav_bar/nav_php.php");
require ("../db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_SESSION['user'];

    // Check if the user already has an active membership
    $stmt = $link->prepare("SELECT * FROM memberships WHERE user_id = ? AND end_date > CURDATE()");
    $stmt->bind_param("i", $user['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // The user already has an active membership
        echo "You already have an active membership.";
    } else {
        $user_id = $_SESSION['user_id'];  // Get the user id from the session
        $card_number = $_POST['card_number'];  // Get the card number from the form
        $cvv = $_POST['cvv'];  // Get the cvv from the form
        
        // Insert the payment into the credit_card_details table
        $stmt = $link->prepare("INSERT INTO credit_card_details (user_id, card_number, expiry_date, cvv) VALUES (?, ?, CURDATE(), ?)");
        $stmt->bind_param("isi", $user_id, $card_number, $cvv);
        $stmt->execute();

        // Insert the membership into the memberships table
        $stmt = $link->prepare("INSERT INTO memberships (user_id, start_date, end_date) VALUES (?, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 1 YEAR))");
        $stmt->bind_param("i", $user['user_id']);
        $stmt->execute();
    }
}
?>