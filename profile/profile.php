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
require("../nav_bar/nav_php.php");
require("../db_connection.php"); 



// Check if the user is signed in
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

//User Details section
echo '<section class="profile-container">';
    echo '<h2 class="collapsible-header"> User Details</h2>';
    echo '<div class="collapsible-content">';
        echo '<section class="user-details">';
    // Form for updating user details
echo '<form action="update_user_detail.php" method="post">'; 
    foreach ($user as $key => $value) {
            if ($key !== 'registration_date' && $key !== 'user_id' && $key !== 'company_logo' && $key !== 'membership') {
            echo '<div class="user-detail">';
            echo '<label for="' . $key . '-input">' . ucfirst($key) . ':</label>';
            if ($key === 'password') {
                echo '<input type="password" id="' . $key . '-input" name="' . $key . '" value="' . htmlspecialchars($value) . '">';
          
            } else {
                echo '<input type="text" id="' . $key . '-input" name="' . $key . '" value="' . htmlspecialchars($value) . '">';
            }
            echo '</div>'; 
        }
    }

echo '<div class="submit-button-container">';
echo '<input type="submit" class="button-common" value="Update">';
echo '</div>'; // Close submit-button div
echo '</form>'; // Close form
echo '</section>'; // Close user-details section
echo '</div>'; // Close collapsible-content div
echo '</section>';


//LOGIC FOR ACTIVE MEMBERSHIP
$stmt = $link->prepare("SELECT * FROM memberships WHERE user_id = ? AND end_date > CURDATE()");
$stmt->bind_param("i", $user['user_id']);
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

//Active Membership Section
    echo '<section class="membership-status-container">';
if (!empty($result)) {
    echo '<h2 class="collapsible-header"> Membership current status</h2>';
    echo '<div class="collapsible-content">';
    echo '<p><strong> Active</strong></p>';
    echo "(Your membership will expire on the " . $result[0]['end_date'];
    
    $end_date = new DateTime($result[0]['end_date']);
    $current_date = new DateTime(date("d-m-Y"));
    $interval = $current_date->diff($end_date);
    
    echo " you have " . $interval->days . " days left)";
} else {
    echo '<h1><strong>Membership status</strong></h1>';
    echo '<p><strong>Inactive</strong></p>';
    echo '<a href="../memberships/form.php">Purchase Membership</a>';
  
}
echo '</div>'; // Close collapsible-content div
echo '</section>'; 



// Certificates Section
    echo '<section class="certificates">';
    echo '<h2 class="collapsible-header">Certificates</h2>';
    echo '<div class="collapsible-content">';
    echo '<div class="certificate-container">';
    $stmt = $link->prepare("SELECT * FROM certificates WHERE user_id = ?");
    $stmt->bind_param("i", $user['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    $certificates = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $certificates[] = $row;
    }

    if (count($certificates) > 0) {
        foreach ($certificates as $certificate) {
            echo '<a href="../Green_calculator/certificates_pdfs/certificates_pdf.php?id=' . $certificate['id'] . '">';
            echo '<div class="certificate">';
            echo '<h3>' . htmlspecialchars($certificate['award']) . '</h3>';
            echo '<p>' . date('Y-m-d') . '</p>';
            
            // Image based on the award
            $awardImage = "http://localhost/SustainabilityApp/Green_calculator/certificates_pdfs/award_images/{$certificate['award']}_award.png";
            echo '<img src="' . $awardImage . '" alt="Certificate Image">';
            echo '</div>'; // Close certificate div
            echo '</a>';
        }
    } else {
        echo '<p>You do not have any certificates yet.</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</section>'; // Close certificates section
    

    // Update Success Message
    if (isset($_SESSION['update_success'])) {
        echo '<div class="update-success">';
        echo '<p>Your details have been updated.</p>';
        echo '</div>'; // Close update-success div
        unset($_SESSION['update_success']);
        echo '<button onclick="window.location.href=\'http://localhost/SustainabilityApp/profile/profile.php\'">Go Back</button>';
    }
} else {
    echo '<p>Please log in to view this page.</p>';
}
?>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all the elements with the class 'collapsible-header'
        var collapsibleHeaders = document.querySelectorAll('.collapsible-header');

        // Add a click event listener to each header
        collapsibleHeaders.forEach(function(header) {
            header.addEventListener('click', function() {
                // Toggle the 'active' class on the header
                this.classList.toggle('active');

                // Get the next sibling element, which is the content div
                var content = this.nextElementSibling;

                // Toggle the display CSS property based on its current visibility
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        });
    });
</script>
</html>
