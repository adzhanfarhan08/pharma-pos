<?php
session_start();
include 'db.php';

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind Import -->
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
                        <?php
                        // Query untuk mengambil data produk
                        $query = "SELECT * FROM tb_product";
                        $result = $koneksi->query($query);

                        if ($result->num_rows > 0) {
                            // Output data dari setiap baris
                            echo "<table class='min-w-full divide-y divide-gray-200'>";
                            echo "<thead class='bg-gray-50'>";
                            echo "<tr>";
                            echo "<th class='px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider'>Nama Produk</th>";
                            echo "<th class='px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider'>Deskripsi</th>";
                            echo "<th class='px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider'>Harga</th>";
                            echo "<th class='px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider'>Aksi</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody class='bg-white divide-y divide-gray-200'>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-center'>" . htmlspecialchars($row['product_name']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-center'>" . htmlspecialchars($row['description']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-center'>" . htmlspecialchars($row['price']) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-center'>
                                    <form action='delete_product.php' method='POST' onsubmit='return confirm(\"Apakah Anda yakin ingin menghapus produk ini?\");'>
                                        <input type='hidden' name='product_id' value='" . $row['id'] . "'>
                                        <input type='submit' value='Hapus' class='px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50'>
                                    </form>
                                </td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "Tidak ada produk tersedia.";
                        }

                        // Tutup koneksi database
                        $koneksi->close();
                        ?>
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