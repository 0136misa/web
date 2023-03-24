<?php
include 'db.php';
// Lấy từ khóa tìm kiếm từ form
if (isset($_GET["search"])) {
$search = $_GET['search'];
}

// Thực hiện truy vấn để lấy danh sách sách thỏa mãn điều kiện tìm kiếm
if(isset($_GET["search"]))
    $query = "SELECT * FROM tblBook WHERE ID LIKE '%$search%' OR title LIKE '%$search%' OR author LIKE '%$search%' ";
else
    $query = "SELECT * FROM tblBook";
$result = $conn->query($query);

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
    // Không tìm thấy sách nào thỏa mãn điều kiện tìm kiếm
    echo " Không thấy kết quả nào";
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav li {
    display: inline-block;
    margin-right: 20px;
}

nav li a {
    color: #fff;
    text-decoration: none;
}

main {
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}
</style>

<main>
        <form action="search_book.php" method="get">
        </form>
</main>

</body>
</html>