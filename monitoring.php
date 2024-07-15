<?php
session_start();

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['username']) || $_SESSION['role'] != 1) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Ambil data pengguna dari database
$sql = "SELECT * FROM tb_users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind Import -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- <link href="public/css/tailwind.css" rel="stylesheet"> -->
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
                            <li class="mb-2"><a href="http://localhost/pharma-pos/dashboard_admin.php" class="block p-2 rounded hover:bg-gray-700">Produk</a></li>
                            <li class="mb-2"><a href="http://localhost/pharma-pos/monitoring.php" class="block p-2 rounded hover:bg-gray-700">Monitoring User</a></li>
                            <li class="mb-2 text-red-500"><a href="logout.php" class="block p-2 rounded hover:bg-gray-700">Logout</a></li>
                        </ul>
                    </nav>
                </ul>
            </nav>
            <main class="flex-1 p-4">
                <header class="bg-blue-600 text-white p-2">
                    <h1 class="text-xl">Data User</h1>
                </header>
                <table class="min-w-full bg-white border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-5">Username</th>
                            <th class="p-5">Role</th>
                            <th class="p-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result !== false && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['role_id'] != 1) { // Menampilkan hanya jika role_id bukan 1 (Admin)
                                    echo '<tr class="border border-gray-300">';
                                    echo '<td class="border border-gray-300 py-2 px-4">' . $row['username'] . "</td>";
                                    echo '<td class="border border-gray-300 py-2 px-4">' . ($row['role_id'] == 1 ? 'Admin' : 'Customer') . "</td>";
                                    echo '<td class="border border-gray-300 py-2 px-4">';
                                    echo '<form method="post" action="delete_user.php">';
                                    echo '<input type="hidden" name="user_id" value="' . $row['user_id'] . '">';
                                    echo '<button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded-md">Delete</button>';
                                    echo '</form>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                        } else {
                            echo "<tr><td colspan='3'>Tidak ada pengguna terdaftar</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <br>
            </main>
        </div>

        <footer class="bg-gray-800 text-white text-center p-4">
            <p>&copy; 2024 Pharma POS. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>