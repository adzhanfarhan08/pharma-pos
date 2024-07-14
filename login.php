<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>

<body>
    <h2>LOGIN</h2>
    <form action="" method="POST">
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
    </form>
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
</body>

</html>