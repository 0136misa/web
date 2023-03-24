<?php
// Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];

// Thực hiện insert dữ liệu vào bảng tblUser
    $query = "INSERT INTO tblUser (username, password, fullname, email, avatar) VALUES ('$username', '$password', '$fullname', '$email', '$avatar')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Thêm người dùng thành công
    } else {
        // Thêm người dùng thất bại
    }
?>