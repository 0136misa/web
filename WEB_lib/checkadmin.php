<?php
include 'db.php';
// Check if the user is logged in and has admin privileges
$username = $_SESSION["user"];
$sql = "SELECT * FROM tblUser WHERE Username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$is_admin = $row["is_admin"];

if ($is_admin == 1) {
  // Người dùng đăng nhập là admin
} else {
  // Người dùng không phải là admin
}

// Giải phóng tài nguyên
mysqli_free_result($result);
mysqli_close($conn);
?>