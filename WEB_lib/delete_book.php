<?php
// Lấy id của sách cần xoá
    include 'db.php';
    session_start();
    $id = $_GET['id'];

// Thực hiện delete dữ liệu khỏi bảng tblBook
    $query = "DELETE FROM tblBook WHERE id='$id'";
    $result = $conn->query($query);

    if ($result) {
        // Xoá sách thành công
    } else {
        // Xoá sách thất bại
    }
?>