

<?php 


 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require ("../db_connection.php");
    $name = $link->real_escape_string(trim($_POST['name']));
      $surname = $link->real_escape_string(trim($_POST['surname']));
      $company_name = $link->real_escape_string(trim($_POST['company_name']));
      
      $email = $link->real_escape_string(trim($_POST['email']));

      $password1 = $_POST['pass1'];
      $password2 = $_POST['pass2'];
  
      // Handle the file upload
      if (isset($_FILES['company_logo']) && $_FILES['company_logo']['error'] == 0) {
        $upload_dir = 'C:\xampp1\htdocs\SustainabilityApp\registration\logos_images_uploaded';
        $upload_file = $upload_dir . '/'. basename($_FILES['company_logo']['name']);
    
        if (move_uploaded_file($_FILES['company_logo']['tmp_name'], $upload_file)) {
            $company_logo = 'http://localhost/SustainabilityApp/registration/logos_images_uploaded/' . basename($_FILES['company_logo']['name']);
        } else {
            $errors[] = 'Failed to upload logo.';
        }
    } else {
        $company_logo = null;
    }
      if (empty($name)) {
          $errors[] = 'Enter your name.';
      }
      if (empty($surname)) {
          $errors[] = 'Enter your surname.';
      }
        if (empty($company_name)) {
            $errors[] = 'Enter your company name.';
      }
      if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors[] = 'Enter a valid email address.';
      }
      if (empty($password1)) {
          $errors[] = 'Enter your password.';
  
      } elseif ($password1 != $password2) {
          $errors[] = 'Passwords do not match.';
      } else {
          // Check for minimum length
          if (strlen($password1) < 8) {
              $errors[] = 'Password must be at least 8 characters.';
          }
      
          // Check for complexity (at least one uppercase, one lowercase, one number, one special character)
          if (!preg_match('/[A-Z]/', $password1)) {
              $errors[] = 'Password must include at least one uppercase letter.';
          }
          if (!preg_match('/[a-z]/', $password1)) {
              $errors[] = 'Password must include at least one lowercase letter.';
          }
          if (!preg_match('/[0-9]/', $password1)) {
              $errors[] = 'Password must include at least one number.';
          }
          if (!preg_match('/[\W]/', $password1)) {
              $errors[] = 'Password must include at least one special character.';
          }
      }
  
  
      // If no errors, proceed with database insertion
      if (empty($errors)) {
        
         
          $stmt = $link->prepare("INSERT INTO business_registrations (name, surname, company_name, company_logo, email, password) VALUES (?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssss", $name, $surname, $company_name, $company_logo, $email, $password1);
          
          if ($stmt->execute()) {
            echo 'You are now registered.';
          } else {
              echo 'Error registering user.';
          }
          $stmt->close();
      } else {
          foreach ($errors as $msg) {
              echo "- $msg<br>";
          }

 }
}

?>


