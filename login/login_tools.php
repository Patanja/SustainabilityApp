<?php
/* In PHP, a session is a way to store information (in variables) to be used 
across multiple pages. Unlike a cookie, 
the information is not stored on the users' computer, but on the server.

When you start a session using session_start(), PHP creates a unique identifier for that session.
This identifier is sent to the user's browser and stored as a cookie. 
When the user navigates to a different page on your website,
their browser sends this identifier back to the server. 
PHP uses this identifier to find the session data on the server and load it into the $_SESSION superglobal array,
making the session data available to your script.

Session data is typically used to track user activity on a website. For example,
 you can store a user's login status in a session variable. 
 This allows you to check whether the user is logged in on every page, 
 and display different content depending on their login status.
*/

 // session_start(); should be initialised in every page that uses sessions.


 session_start();
 error_reporting(E_ALL); ini_set('display_errors', 1);

 require ('..\db_connection.php');
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $company_name = $link->real_escape_string(trim($_POST['company_name']));
     $password = $_POST['password'];
 
     $stmt = $link->prepare("SELECT * FROM business_registrations WHERE company_name = ?");
     $stmt->bind_param("s", $company_name);
     $stmt->execute();
     $result = $stmt->get_result();

     if ($result->num_rows > 0) {
         $user = $result->fetch_assoc();
         if ($password === $user['password']) {
             $_SESSION['user_id'] = $user['user_id'];
             $_SESSION['user'] = $user;
             echo 'Login successful';
                     // Redirect to the home page
        header("Location: /SustainabilityApp/Home_page/home_page.php");
        exit();
         } else {
             echo 'Invalid password';
         }
     } else {
         echo 'Company name not found';
     }
 
     $stmt->close();
 }
 
 ?>