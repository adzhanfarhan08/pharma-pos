<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind Import -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- AOS Import -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Product</title>
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
                    <!-- Product Input -->
                    <form action="save_product.php" method="POST" enctype="multipart/form-data">
                        <label for="product_name">Nama Produk:</label>
                        <input class="bg-gray-200" type="text" id="product_name" name="product_name" required><br><br>

                        <label for="description">Deskripsi:</label><br>
                        <textarea class="bg-gray-200" id="description" name="description" rows="4" cols="50"></textarea><br><br>

                        <label for="price">Harga:</label>
                        <input class="bg-gray-200" type="number" id="price" name="price" required><br><br>

                        <input type="submit" value="Simpan Produk" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    </form>
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