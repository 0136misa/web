<?php
include 'db.php';
// Thực hiện truy vấn để lấy danh sách sách
$query = "SELECT * FROM tblBook";
$result  = $conn->query($query);

// Kiểm tra xem có dữ liệu hay không
if (mysqli_num_rows($result) > 0) {
    // Hiển thị dữ liệu ra bảng
    echo "<table>";
    echo "<tr><th>ID</th><th>Title</th><th>Author</th><th>Price</th><th>Description</th><th>Image</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['Title'] . "</td>";
    echo "<td>" . $row['Author'] . "</td>";
    echo "<td>" . $row['Price'] . "</td>";
    echo "<td>" . $row['Description'] . "</td>";
    echo "<td>" . $row['Image'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    } else {
    // Không tìm thấy sách nào
    }
?>