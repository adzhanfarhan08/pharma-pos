<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind Import -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- AOS Import -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>LOGIN</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen" data-aos="zoom-in">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="user" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="user" id="user" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Username">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Password">
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" name="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Login
                </button>
            </div>
            <div class="my-4 text-center">
                <p class="text-sm text-gray-600">Don't have an account? <a href="register.php" class="text-blue-600 hover:underline">Register</a></p>
            </div>
        </form>
    </div>

    <!-- Database Init -->
    <?php
    if (isset($_POST['submit'])) {
        session_start();
        include 'db.php';

        $user = $_POST['user'];
        $password = $_POST['password'];

        $check = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $user . "' AND password = '" . $password . "'");
        if (mysqli_num_rows($check) > 0) {
            $d = mysqli_fetch_object($check);
            $_SESSION['status_login'] = true;
            $_SESSION['admin_global'] = $d;
            $_SESSION['id'] = $d->admin_id;

            echo '<script>window.location="dashboard.php"</script>';
        } else {
            echo '<script>alert("Username atau Password yang anda masukkan tidak ditemukan")</script>';
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