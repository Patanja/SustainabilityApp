<?php // this is the old link, all pages are using C:\xampp1\htdocs\SustainabilityApp\db_connection.php now, this file may not be needed.
$link = mysqli_connect('localhost', 'root', '', 'susapp');

if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
else {
    echo "connection successful";
}
?>