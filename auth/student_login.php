<?php
include("../db/connection.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND role='student'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = 'student';
        header("Location: ../student/dashboard.php");
    } else {
        echo "Invalid credentials";
    }
}
?>

<form method="post">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button name="login">Login</button>
</form>
