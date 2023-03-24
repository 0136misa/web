<?php
include 'db.php';
session_start();

// Xử lý thông tin đăng nhập khi người dùng nhấn nút Login
if(isset($_POST['username'])&&isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tblUser WHERE Username='$username' AND Password='$password'";
    $result  = $conn->query($sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $is_admin= $row["is_admin"];
        if($is_admin == 1){
            header('Location: admin.php');
            exit();
        }
        else{
            header('Location: book-list.php');
        }
    }
}
?>

