<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_pharma_pos';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}
