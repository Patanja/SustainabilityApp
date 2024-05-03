<!-- This form is one of the most important parts of this app, therefore it payed special atention to the UI and UX
making use of JavaScript and CSS. -->

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="stylesheet" href="gc_styles.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
<body>

<?php 
require '../nav_bar/nav_php.php';
require '../db_connection.php';  
require 'gc_main.php';
?>
<div class = "instructions" id="instructions">
    <img src = "..\Home_page\images\calculator_no_background.png" alt="Green Calculator" >
        <div class= "text-content">
            <h1>Welcome to The Green Calculator</h1>
            <p> Use the drop-down menu to choose what suits the most to your company's sustainable action </p>
            <p> There are a total of 10 categories</p>
            <p> Once you have selected an option for each category, click the "Calculate" button to see your total score</p>
            <p> <strong>Every NONE gives you 0 points, every SOME  5 points and every LOTS 10 points, maximum is 100 points</strong></p>
            <p><strong> Every missing point cost £1</strong></p>
            <input type="button" value="Start" class="start-button" id="startButton">
        </div>


</div>

<form id= "mainForm" action="gc_main.php" method="post" > 
<div class="form-section active" id="aspect1" onchange="scrollToNextAspect(1)">
    <img src = "..\Green_calculator\images\carbon.jpg" alt="Carbon Emissions Reduction" >
    <label for="aspect1">Carbon Emissions Reduction</label>
    <p>Carbon emissions from your company reflect the total CO2 released due to business activities. Progress in reducing carbon footprints can be achieved by switching to electric vehicles, reducing fleet size, or promoting a bike-to-work scheme.</p>
    <select id="aspect1" name="Carbon">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<!-- scrollToNextAspect(1) function is important for
JavaScript to work and make the page automatically scroll
down to the next aspect when the user selects an option for the current aspect. -->

<div class="form-section" id="aspect2" onchange="scrollToNextAspect(2)">
<img src = "..\Green_calculator\images\waste.png" alt="waste">
        <label for="aspect2">Waste reduction</label>
        <p>Waste management involves the strategies and actions your company takes to reduce, reuse, recycle, and properly dispose of waste materials. Implementing comprehensive recycling programs or choosing reusable materials can significantly reduce waste. </p>
    <select id="aspect2" name="Waste">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<div class="form-section" id="aspect3" onchange="scrollToNextAspect(3)">
<img src = "..\Green_calculator\images\water.jpg" alt="water">
        <label for="aspect3">Water Conservation</label>
        <p> Water consevation refers to your company's efforts to manage water use efficiently and sustainably. This can include installing water-saving devices, recycling water for multiple uses, or supporting watershed management projects. </p>
    <select id="aspect3" name="Water">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<div class="form-section" id="aspect4" onchange="scrollToNextAspect(4)">
<img src = "..\Green_calculator\images\supply.jpg" alt="supply chain">
        <label for="aspect4">Sustainable Supply Chain</label>
        <p> A sustainable supply chain involves the responsible sourcing of materials, products, and services. Your company can contribute to sustainability by choosing suppliers with ethical practices, reducing transportation emissions, or supporting fair trade initiatives. </p>
    <select id="aspect4" name="Supply">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<div class="form-section" id="aspect5" onchange="scrollToNextAspect(5)">
<img src = "..\Green_calculator\images\biodiversity.jpg" alt="biodiversity">
        <label for="aspect5">Biodiversity Preservation</label>
        <p> Biodiversity preservation involves protecting and restoring the variety of life on Earth. Your company can contribute to biodiversity by conserving natural habitats, supporting wildlife protection programs, or implementing sustainable land-use practices. </p>
    <select id="aspect5" name="Biodiversity">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<div class="form-section" id="aspect6" onchange="scrollToNextAspect(6)">
<img src = "..\Green_calculator\images\energy.jpg" alt="energy-efficient infrastructure">
        <label for="aspect6">Energy-Efficient Infrastructure</label>
        <p> Energy-efficient infrastructure involves using energy resources efficiently and reducing energy consumption. Your company can achieve energy efficiency by upgrading to energy-efficient appliances, installing smart building systems, or implementing renewable energy solutions. </p>
    <select id="aspect6" name="Energy-Efficient">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<div class="form-section" id="aspect7" onchange="scrollToNextAspect(7)">
<img src = "..\Green_calculator\images\eco-friendly.jpg" alt="eco-friendly products">
        <label for="aspect7">Eco-Friendly Products/Services</label>
        <p> Eco-friendly products and services are those that have a minimal impact on the environment. Your company can contribute to eco-friendliness by offering sustainable products, reducing packaging waste, or promoting eco-friendly practices among customers. </p>
    <select id="aspect7" name="Eco-Friendly">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<div class="form-section" id="aspect8" onchange="scrollToNextAspect(8)">
<img src = "..\Green_calculator\images\community.jpg" alt="community engagement">
        <label for="aspect8">Community Engagement</label>
        <p> Community engagement involves interacting with local communities and stakeholders to address social and environmental issues. Your company can engage with the community by supporting local initiatives, volunteering for community projects, or promoting social responsibility programs. </p>
    <select id="aspect8" name="Community">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<div class="form-section" id="aspect9" onchange="scrollToNextAspect(9)">
<img src = "..\Green_calculator\images\transparency.jpg" alt="transparency and reporting">
        <label for="aspect9">Transparency and Reporting</label>
        <p> Transparency and reporting involve openly sharing information about your company's sustainability practices and performance. Your company can demonstrate transparency by publishing sustainability reports, engaging with stakeholders, or participating in sustainability certifications. </p>
    <select id="aspect9" name="Transparency">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
        </select>
</div>

<div class="form-section" id="aspect10" onchange="scrollToNextAspect(10)">
<img src = "..\Green_calculator\images\energy.jpg" alt="renewable energy usage">
        <label for="aspect10">Renewable Energy Usage</label>
        <p> Renewable energy usage involves generating electricity from renewable sources such as solar, wind, or hydro power. Your company can contribute to renewable energy by installing solar panels, purchasing renewable energy certificates, or supporting renewable energy projects. </p>
    <select id="aspect10" name="Energy">
        <option value="" disabled selected>Select an option</option>
        <option value="none">None</option>
        <option value="some">Some</option>
        <option value="lots">Lots</option>
    </select>

    <input type="submit" value="Calculate" class= "calculate-button">
</form>
</div>




</body>

<script src="questions.js"></script>

</html>
