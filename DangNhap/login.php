<?php
session_start();
require 'connect.php';
$username = $_POST['Username'];
$password = $_POST['Password'];

$sql = "select user.* from user where ten_tk = '$username' and mat_khau = '$password'";
$result = mysqli_query($connect, $sql);
$num_rows = mysqli_num_rows($result);

if ($num_rows == 1) {
    $first = mysqli_fetch_array($result);
    $_SESSION['username'] = $first['ten_tk'];
    $_SESSION['name'] = $first['ten_nd'];
    header("location:../GiaoDienChinh/");
    exit();
} else {
    header("location:index.php?error=Đăng nhập không thành công!");
    mysqli_close($connect);
}
