
<?php

$dbhost = 'localhost:3307';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'final_adb'; // <-- your db name
$conn = @mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// turn off mysqli errors
mysqli_report(0);