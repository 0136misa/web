<?php
// Lấy id của người dùng cần xoá
    $id = $_GET['id'];

// Thực hiện delete dữ liệu khỏi bảng tblUser
    $query = "DELETE FROM tblUser WHERE id='$id'";
    $result = $conn->query($query);

    if ($result) {
// Xoá người dùng thành công
    } else {
// Xoá người dùng thất bại
    }
?>