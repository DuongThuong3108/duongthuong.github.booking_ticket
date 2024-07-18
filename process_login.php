<?php
include('config.php');
session_start();
$email = $_POST["Email"];
$pass = $_POST["Password"];

// Kiểm tra thông tin đăng nhập
$qry = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
if (mysqli_num_rows($qry)) {
    $usr = mysqli_fetch_array($qry);
    // Nếu tìm thấy người dùng, thiết lập session và điều hướng đến trang mong muốn
    $_SESSION['user'] = $usr['UserID'];
    if (isset($_SESSION['show'])) {
        header('location:booking.php');
    } else {
        header('location:index.php');
    }
} else {
    // Nếu thông tin đăng nhập không đúng, thiết lập lỗi và điều hướng về trang đăng nhập
    $_SESSION['error'] = "Login Failed!";
    header("location:login.php");
}
?>
