<?php 
require 'connect.php';
$ten_tk = $_POST['ten_tk'];
$mat_khau = $_POST['mat_khau'];
$ten_nd = $_POST['ten_nd'];
$gmail = $_POST['gmail'];

$check = "select *from user where ten_tk ='$ten_tk'";
$result = mysqli_query($connect,$check);
$num_rows = mysqli_num_rows($result);

if($num_rows ==1){
    header("location:register.php?error=Tên đăng nhập đã tồn tại !.");
    exit();
}else {
    $insert = "insert into user (ten_tk,mat_khau,ten_nd,gmail) 
    values('$ten_tk','$mat_khau','$ten_nd','$gmail')"; 
    mysqli_query($connect,$insert);
    header("location:index.php");
    mysqli_close($connect);
    exit();
}