<?php // connect_db.php
$link = mysqli_connect('localhost', 'root', '', 'susapp');

if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}


?>