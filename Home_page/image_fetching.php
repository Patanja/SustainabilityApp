<?php 
require ('C:\xampp\htdocs\SustainabilityApp\db_connection.php');

// SQL to fetch image path for specific IDs
$sql = "SELECT image_name, image_path FROM image_storage WHERE id IN (1, 2, 3, 4) ORDER BY id ASC";
$result = $link->query($sql);

$sections = [
    1 => ['title' => 'Welcome', 'buttonText' => 'Sign In', 'buttonLink' => 'signin.php'],
    2 => ['title' => 'Register', 'buttonText' => 'Register Now', 'buttonLink' => 'register.php'],
    3 => ['title' => 'Green Calculator', 'buttonText' => 'Explore', 'buttonLink' => 'calculator.php'],
    4 => ['title' => 'News and Articles', 'buttonText' => ['Subscribe', 'Donate'], 'buttonLink' => ['subscribe.php', 'donate.php']]
];

if ($result->num_rows > 0) {
    $i = 1;
    while($row = $result->fetch_assoc()) {
        $section = $sections[$i++];
        echo "<div class='section' style='text-align: center; margin-top: 20px;'>";
        echo "<img src='" . $row["image_path"] . "' alt='" . $row["image_name"] . "' style='width:100%;'>";
        echo "<h2>" . $section['title'] . "</h2>";
        if(is_array($section['buttonText'])){
            foreach($section['buttonText'] as $index => $text){
                echo "<a href='" . $section['buttonLink'][$index] . "' class='btn btn-primary'>" . $text . "</a> ";
            }
        } else {
            echo "<a href='" . $section['buttonLink'] . "' class='btn btn-primary'>" . $section['buttonText'] . "</a>";
        }
        echo "</div>";
    }
} else {
    echo "0 results";
}
?>