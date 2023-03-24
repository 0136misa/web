<?php
// Lấy dữ liệu từ form
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

// Thực hiện insert dữ liệu vào bảng tblBook

    $query = "INSERT INTO tblBook (title, author, price, description, image) VALUES ('$title', '$author', '$price', '$description', '$image')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Thêm sách thành công
    } else {
        // Thêm sách thất bại
    }
?>