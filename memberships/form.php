<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyles.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php

require ("../nav_bar/nav_php.php");
?>
    <div id="membershipOffer" class="Membership-offer">
        <h1>Purchase Membership</h1>
        <h2>To access the Green Calculator</h2>
        <p>only £99.99 </p>
        <h1> valid for ONE year!</h1>
        <input type="submit" value="Proceed with payment">
    </div>

    
    <div id="paymentForm" class="Payment-drop-down">
        <form id="membershipForm" method="POST" action="memberships.php">
            <label for="card_number">Card Number:</label><br>
            <input type="text" id="card_number" name="card_number" required><br>

            <label for="expiry_date">Expiry Date (MM/YY):</label><br>
            <input type="text" id="expiry_date" name="expiry_date" required><br>

            <label for="cvv">CVV:</label><br>
            <input type="text" id="cvv" name="cvv" required><br>

            <input type="submit"  id = "purchaseForm" value="Purchase Membership">
        </form>
    </div>

    <div id="successMessage" class="successMessage">
    
    <p>Thank you for your purchase!</p>

</div>
<a id ="gc-button" class = "button-common" href= "../Green_calculator/gc.php">
        Try Green Calculator now!
</a>

   <script src="javaScripts.js"></script> 
</body>
</html>