<?
// Lấy dữ liệu từ form
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];

// Thực hiện update dữ liệu vào bảng tblUser
    $query = "UPDATE tblUser SET username='$username', password='$password', fullname='$fullname', email='$email', avatar='$avatar' WHERE id='$id'";
    $result = $conn->query($query);

    if ($result) {
        // Sửa người dùng thành công
    } else {
        // Sửa người dùng thất bại
    }
?>