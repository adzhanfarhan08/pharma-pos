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

// Ambil ID produk dari form
$product_id = $koneksi->real_escape_string($_POST['product_id']);

// Query untuk menghapus produk
$query = "DELETE FROM tb_product WHERE id='$product_id'";

if ($koneksi->query($query) === TRUE) {
    echo '<script>alert("Produk berhasil dihapus")</script>';
    header("Location: dashboard_admin.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . $koneksi->error;
}

// Tutup koneksi database
$koneksi->close();
