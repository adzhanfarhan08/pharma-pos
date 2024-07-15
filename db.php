<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_pharma_pos';

// Make Connection To Database
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Checking Connection To Database
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}
