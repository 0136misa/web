<?php
    include 'db.php';
    $query = "SELECT * FROM tblUser";
    $result = $conn->query($query);;
    
// Kiểm tra xem có dữ liệu hay không
    if (mysqli_num_rows($result) > 0) {
        
// Hiển thị dữ liệu ra bảng
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Fullname</th><th>Email</th><th>Avatar</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['avatar'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Không tìm thấy người dùng nào
    }
?>