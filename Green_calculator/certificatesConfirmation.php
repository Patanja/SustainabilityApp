<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="stylesheet" href="certificateConfirmation.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
require ("../nav_bar/nav_php.php");
require ("../db_connection.php");

$companyName = $_SESSION['user']['company_name'];
$companyLogo = $_SESSION['user']['company_logo'];
if (empty($companyLogo)) {
    $query = "SELECT company_logo FROM business_registrations WHERE company_name = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param('s', $companyName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $companyLogo = $row['company_logo'];
}

$award = $_SESSION['award'];
$donationAmount = $_SESSION['donationAmount'];



echo '<div class="certificate">';
echo '<h1>Congratulations to:</h1>';
echo '<h2>' . htmlspecialchars($companyName) . '</h2>';
echo '<p>Whose efforts to contribute to sustainability obtained: <strong>' .  $award . '</strong> award.</p>';

if ($donationAmount > 0) {
    echo '<p>And this amount: £' . $donationAmount . ' donation.</p>';
}

echo '<div class="logos">';
echo '<img class="logo" src="../logo.png" alt="Sustainability App Logo">';
echo '<img class="logo" src="' . htmlspecialchars($companyLogo) . '" alt="Company Logo">';
echo '</div>';

echo '<p>Edinburgh, UK</p>';
echo '<p>' . date('jS F Y') . '</p>';
echo '</div>';

echo '<button onclick="window.location.href=\'http://localhost/SustainabilityApp/profile/profile.php\'">Go Back</button>';
?>
</body>

</html>
