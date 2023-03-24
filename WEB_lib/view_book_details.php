<?php
// Lấy id của sách cần xem chi tiết
include'db.php';
if (isset($_GET["View"])) {
    $id = $_GET['View'];
// Thực hiện truy vấn để lấy thông tin sách
$query = "SELECT * FROM tblBook WHERE ID='$id'";
$result = $conn->query($query);

// Kiểm tra xem có dữ liệu hay không
if (mysqli_num_rows($result) > 0) {
    // Hiển thị thông tin sách
    echo "<table>";
    echo "<tr><th>ID</th><th>Title</th><th>Author</th><th>Price</th><th>Description</th><th>Image</th></tr>";
    $row = mysqli_fetch_assoc($result);
    echo "<h2>" . $row['Title'] . "</h2>";
    echo "<p>Author: " . $row['Author'] . "</p>";
    echo "<p>Price: " . $row['Price'] . "</p>";
    echo "<p>Description: " . $row['Description'] . "</p>";
    echo "<img src='" . $row['Image'] . "'>";
} else {
    // Không tìm thấy sách cần xem chi tiết
}
}
?>
