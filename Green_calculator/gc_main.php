<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="stylesheet" href="gc_styles.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require '../db_connection.php';
require '../db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

$user = $_SESSION['user'];

// Check active membership with error handling

try {
    // Prepare the SQL statement
    $stmt = $link->prepare("SELECT * FROM memberships WHERE user_id = ? AND CURDATE() BETWEEN start_date AND end_date");
    
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $link->error);
    }

    // Bind parameters and execute
    $stmt->bind_param("i", $user['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Redirect if no membership is active
        header("Location: ../memberships/form.php");
        exit();
    }

    // Additional logic to handle the results can go here
} catch (Exception $e) {
    // Handle exceptions such as database errors
    error_log($e->getMessage());
    // Redirect or inform the user about the error
    echo "An error occurred. Please try again later.";
    exit();  // Optionally exit the script if the error prevents further execution
}

// Define aspects and scores
$aspects = ['Carbon', 'Waste', 'Water', 'Supply', 'Biodiversity', 'Energy-Efficient', 'Eco-Friendly', 'Community', 'Transparency', 'Energy'];
$scores = ['none' => 0, 'some' => 5, 'lots' => 10];

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalScore = 0;
    foreach ($aspects as $aspect) {
        if (isset($_POST[$aspect]) && isset($scores[$_POST[$aspect]])) {
            $totalScore += $scores[$_POST[$aspect]];    
        }
    }
    

    // Calculate donation amount and determine award
    $donationAmount = 100 - $totalScore;
    $award = ($totalScore > 66) ? 'Gold' : (($totalScore > 33) ? 'Silver' : 'Bronze');
    $_SESSION['award'] = $award;
    $companyName = htmlspecialchars($user['company_name']);
    $companyLogo = htmlspecialchars($user['company_logo']);

    echo '<div class="confirmation">';
    echo "<h1>Confirmation</h1>";
    echo "<p>Congratulations $companyName</p>";
    echo "<p>Based on your contributions to sustainability, you have been awarded the: <strong>$award</strong> award.</p>";
    if ($donationAmount > 0) {
        echo "<p>To offset the shortfall in points, you are required to make a payment of £$donationAmount.</p>";
        echo "<button id='donationButton' type='button' onclick='processPayment()' class='button-common'>Proceed with payment donation</button>";
        echo "<div id='payment-process' class='payment-process'></div>";
    } else {
        echo "<p>No donation is required at this time.</p>";
        echo "<button class='button-common' onclick='location.href=\'../profile/profile.php\''>See Your Certificates</button>";
    }
    echo "</div>";

    // Payment and certificate handling
    if ($donationAmount > 0) {
        $stmt = $link->prepare("INSERT INTO payments (user_id, donation_amount, donation_date) VALUES (?, ?, CURDATE())");
        $stmt->bind_param("id", $user['user_id'], $donationAmount);
        $stmt->execute();
        $stmt->close();
    }
    
// Certificate generation

$stmt = $link->prepare("INSERT INTO certificates (user_id, award, donation_amount, issued_date) VALUES (?, ?, ?, CURDATE())");
$stmt->bind_param("isd", $user['user_id'], $award, $donationAmount);
$stmt->execute();
$stmt->close();

$link->close();

}

?>

<script src="questions.js"></script>
<script>
function processPayment() {
    // Placeholder for payment processing
    document.getElementById('payment-process').innerHTML = '<p>Thank you for your payment.</p>';

    // button to see certificates
    var buttonHtml = '<button class="button-common" onclick="location.href=\'../profile/profile.php\'">See Your Certificates</button>';
    document.getElementById('payment-process').innerHTML += buttonHtml;
}

function generateCertificate() {
    window.location.href = '../profile/profile.php';
}
</script>
</body>
</html>
