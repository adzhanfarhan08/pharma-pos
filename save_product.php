<?php
// Koneksi ke database
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_pharma_pos';

$koneksi = new mysqli($hostname, $username, $password, $dbname);

// Check koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$product_name = $koneksi->real_escape_string($_POST['product_name']);
$description = $koneksi->real_escape_string($_POST['description']);
$price = $koneksi->real_escape_string($_POST['price']);

// Query untuk menyimpan data ke dalam tabel tb_product
$query = "INSERT INTO tb_product (product_name, description, price) VALUES ('$product_name', '$description', '$price')";

if ($koneksi->query($query) === TRUE) {
    echo '<script>alert("Produk berhasil disimpan")</script>';
    header("Location: product.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . $koneksi->error;
}

// Tutup koneksi database
$koneksi->close();
