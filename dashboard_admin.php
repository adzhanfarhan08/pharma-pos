<?php
session_start();

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
    <!-- Tailwind Import -->
    <!-- <link href="public/css/tailwind.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-600 text-white p-4">
            <h1 class="text-3xl">Dashboard</h1>
        </header>
        <div class="flex flex-1">
            <nav class="bg-gray-800 text-white w-64">
                <ul>
                    <nav class="bg-gray-800 text-white w-64 p-4">
                        <ul>
                        <li class="mb-2"><a href="dashboard_admin.php" class="block p-2 rounded hover:bg-gray-700">Home</a></li>
                            <li class="mb-2"><a href="monitoring.php" class="block p-2 rounded hover:bg-gray-700">Monitoring User</a></li>
                            <li class="mb-2"><a href="product.php" class="block p-2 rounded hover:bg-gray-700">Product Input</a></li>
                            <li class="mb-2 text-red-500"><a href="logout.php" class="block p-2 rounded hover:bg-gray-700">Logout</a></li>
                        </ul>
                    </nav>
                </ul>
            </nav>
            <main class="flex-1 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">Welcome to Dashboard</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Informasi Produk 1 -->
                        <div class="flex items-center p-4 bg-gray-200 rounded-lg">
                            <img src="" alt="Product Image" class="w-20 h-20 rounded-full">
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Nama Produk 1</h3>
                                <p class="text-gray-700">Jumlah: 100</p>
                                <p class="text-gray-700">Harga: Rp 50,000</p>
                            </div>
                        </div>

                        <!-- Informasi Produk 2 -->
                        <div class="flex items-center p-4 bg-gray-200 rounded-lg">
                            <img src="" alt="Product Image" class="w-20 h-20 rounded-full">
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Nama Produk 2</h3>
                                <p class="text-gray-700">Jumlah: 75</p>
                                <p class="text-gray-700">Harga: Rp 75,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <footer class="bg-gray-800 text-white text-center p-4">
            <p>&copy; 2024 Pharma POS. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>