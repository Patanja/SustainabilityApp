<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home_page_css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="footer.css">
</head>   
<body>
    <!-- Header includes navigation bar -->
    <header>
        <?php require("../nav_bar/nav_php.php"); ?>
        

    </header>

    <!-- Main content area -->
  <main class="container">
        <!-- Welcome Section -->
    <section class="welcome-section">
    <div class="spacer" ></div>
        <div class="welcome-message">

            <?php
        
            if (isset($_SESSION['user']['company_name'])) {
                echo "<h1>Welcome to The Sustainability App, " . $_SESSION['user']['company_name'] . "!</h1>";
            } else {
                echo "<h1>Welcome to The Sustainability App</h1>";
                echo "<p>The site that makes your sustainable actions count!</p>";                
            }
            ?>
        </div>

        <div class="sustainability-video">
                <iframe width="50%" height="100%" src="https://www.youtube.com/embed/M-iJM02m_Hg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </section>



        
        
    <section class="about-section" id= "about">
            <h2>What is the Sustainability App?</h2>
                <p>The Sustainability App is a comprehensive platform designed to help businesses measure, understand, and improve their environmental impact.</p>               
                <p>The Certification Program recognises companies that have demonstrated a commitment to sustainability by achieving a high score on the Green Calculator. Certified companies receive a range of benefits, including access to exclusive resources, networking opportunities, and marketing support.</p>              
                <p>The Green Calculator is a tool that scores your company's environmental performance, providing a clear and concise metric that can be used to benchmark against industry standards, set improvement goals, and track progress over time.</p>
                <?php if(!isset($_SESSION['user']['company_name'])) {
                
                echo "<p><a href='../registration/registration.php' class='button-common'><strong>Sign-up</strong></a> now and start using the Green Calculator and the Certification Program.</p>";
                }
              
                
                ?>
              
            </section>
       

        
        <div class="image-carousel">
    <div class="image-row">
        <img src="../registration/logos_images_uploaded/drimify.png" alt="Image 1">
        <img src="../registration/logos_images_uploaded/edinburghcouncil.png" alt="Image 2">
        <img src="../registration/logos_images_uploaded/scottishpower.png" alt="Image 3">
        <img src="../registration/logos_images_uploaded/spaceX.png" alt="Image 4">
        <img src="../registration/logos_images_uploaded/unesco.png" alt="Image 5">
        
        
    </div>
</div>
  </main>

  <footer class="page-footer">
        <div class="footer-content">
            <p>© 2024 The Sustainability App. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="../copyright.html">Copyright</a></li>
                <li><a href="../privacy_policy.html">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-social-media">
            <a href="https://twitter.com/yourcompany" target="_blank">Twitter</a>
            <a href="https://facebook.com/yourcompany" target="_blank">Facebook</a>
            <a href="https://instagram.com/yourcompany" target="_blank">Instagram</a>
        </div>
    </footer>

</body>

</html>