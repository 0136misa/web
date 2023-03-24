<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sách</title>
    <link rel="stylesheet" href="style.css">
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
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="book-list.php">Danh sách</a></li>
                <?php if (isset($_SESSION["user"])) { ?>
                    <li><a href="profile.php">Thông tin cá nhân</a></li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                <?php } else { ?>
                    <li><a href="login.html">Đăng nhập</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Danh sách sách</h1>
        <form action="search_book.php" method="get">
            <label for="search">Tìm kiếm:</label>
            <input type="text" name="search" id="search" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>">
            <button type="submit">Tìm</button>
        </form>
        <?php
            include("search_book.php");
        ?>
    </main>
</body>
</html>