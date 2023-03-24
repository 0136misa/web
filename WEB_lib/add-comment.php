<?php
// Lấy dữ liệu từ form
$id = $_POST['ID'];
$comment = $_POST['xxxxx'];

// Thực hiện truy vấn để lấy thông tin sách
$query = "SELECT * FROM tblBook WHERE ID='$id'";
$result = mysqli_query($connection, $query);

// Kiểm tra xem có dữ liệu hay không
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
$bookTitle = $row['Title'];
$bookAuthor = $row['Author'];
// Lưu bình luận vào cơ sở dữ liệu
$query = "INSERT INTO tblComment (book_id, name, email, comment) VALUES ('$id', '$comment')";
mysqli_query($connection, $query);

// Hiển thị thông báo thành côngS
echo "<p>Comment added successfully!</p>";

// Hiển thị danh sách bình luận của sách
$query = "SELECT * FROM tblComment WHERE book_id='$id'";
$result = mysqli_query($connection, $query);
echo "<h3>Comments for $bookTitle by $bookAuthor</h3>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p><strong>" . $row['name'] . "</strong>: " . $row['comment'] . "</p>";
}
} else {
// Không tìm thấy sách để bình luận
}
mysqli_close($connection);

?>