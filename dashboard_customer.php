<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit;
// }

// Checking Role
if (isset($_SESSION['role_id'])) {
    if ($_SESSION['role_id'] == 1) {
        // Admin Page
        $welcome_message = "Selamat datang, admin";
    } elseif ($_SESSION['role_id'] == 2) {
        // User Page
        $welcome_message = "Selamat datang";
    } else {
        $welcome_message = "Selamat datang";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Marketplace Penjualan Obat</title>
    <link href="public/css/tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-600 text-white p-4">
            <h1 class="text-3xl">Dashboard - Marketplace Penjualan Obat</h1>
        </header>
        <div class="flex flex-1">
            <nav class="bg-gray-800 text-white w-64 p-4">
                <ul>
                    <li class="mb-2"><a href="#" class="block p-2 rounded hover:bg-gray-700">Dashboard</a></li>
                    <li class="mb-2"><a href="#" class="block p-2 rounded hover:bg-gray-700">Produk</a></li>
                    <li class="mb-2"><a href="#" class="block p-2 rounded hover:bg-gray-700">Transaksi</a></li>
                    <li class="mb-2"><a href="#" class="block p-2 rounded hover:bg-gray-700">Pengaturan</a></li>
                    <li class="mb-2 text-red-500"><a href="logout.php" class="block p-2 rounded hover:bg-gray-700">Logout</a></li>
                </ul>
            </nav>
            <main class="flex-1 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard Marketplace Penjualan Obat</h2>
                    <p class="text-gray-700">Ini adalah tampilan dashboard untuk manajemen marketplace penjualan obat menggunakan PHP dan Tailwind CSS.</p>
                </div>
            </main>
        </div>
        <footer class="bg-gray-800 text-white text-center p-4">
            <p>&copy; 2024 Pharma POS. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>