<?php
// Function Login
function login($username, $password, $conn)
{
    $sql = "SELECT role_id FROM tb_users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result =  $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user['role_id'];
    } else {
        return false;
    }
}

// function login($username, $password, $conn)
// {
//     $sql = "SELECT * FROM tb_users WHERE username = ? AND password = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ss", $username, $password);
//     $stmt->execute();
//     $result =  $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $user = $result->fetch_assoc();
//         // $_SESSION['user_id'] = $user['user_id'];
//         // $_SESSION['username'] = $user['username'];
//         // $_SESSION['role_id'] = $user['role_id'];
//         // $_SESSION['password'] = $user['password'];
//         if ($result->num_row > 0) {
//             $user = $result->fetch_assoc();
//             return $user['role_id'];
//         } else {
//             return false;
//         }
//         // if (password_verify($password, $user['password'])) {
//         // return true;
//         // }
//     }
//     // else {
//     //     return false;
//     // }
// }

function is_logged_in()
{
    return isset($_SESSION['user_id']);
}
