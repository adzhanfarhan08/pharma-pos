<?php
// Pastikan session dimulai untuk mengakses data session
session_start();

// Cek apakah pengguna sudah login atau belum, jika belum arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include file database untuk koneksi
include 'db.php';

// Pastikan form telah disubmit dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil user_id dari form yang dikirimkan
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        // Persiapkan statement SQL untuk menghapus pengguna berdasarkan user_id
        $sql = "DELETE FROM tb_users WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);

        // Lakukan eksekusi statement
        if ($stmt->execute()) {
            // Redirect kembali ke halaman monitoring user setelah penghapusan
            header("Location: dashboard_admin.php");
            exit();
        } else {
            // Jika gagal menghapus, tampilkan pesan error
            echo "Error deleting user.";
        }
    } else {
        // Jika tidak ada user_id yang dikirimkan, tampilkan pesan error
        echo "No user ID provided.";
    }
} else {
    // Jika halaman diakses langsung tanpa melalui POST, arahkan ke halaman monitoring user
    header("Location: dashboard_admin.php");
    exit();
}

// Tutup koneksi database
$stmt->close();
$conn->close();
