<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind Import -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- AOS Import -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Register</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen" data-aos="zoom-in">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form action="register.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" name="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Register
                </button>
            </div>
            <div class="my-4 text-center">
                <p class="text-sm text-gray-600">Have account? <a href="login.php" class="text-blue-600 hover:underline">Login</a></p>
            </div>
        </form>
    </div>

    <!-- Database Init -->
    <?php
    if (isset($_POST['submit'])) {
        include 'db.php';

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validation
        if (empty($username) || empty($email) || empty($password)) {
            echo '<script>alert("Kolom harus diisi")</script>';
        } else {
            $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
            if (mysqli_num_rows($check) > 0) {
                echo '<script>alert("Username and Email sudah tersedia")</script>';
            } else {
                // Insert the user data into the database
                $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
                if (mysqli_query($conn, $query)) {
                    echo '<script>alert("Registrasi Berhasil"); window.location="login.php";</script>';
                } else {
                    echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
                }
            }
        }
    }
    ?>

    <!-- AOS Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>


</html>