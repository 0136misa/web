<?php
session_start();
include 'db.php';
// Query books
$query = "SELECT * FROM tblBook";
$result = mysqli_query($conn, $query);

// Check if there are any books in the database
if (mysqli_num_rows($result) > 0) {
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $books = [];
}

// Close database connection
mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
/* CSS for the admin panel main page */
body {
  background-color: #f5f5f5;
  font-family: Arial, sans-serif;
}
li{
  display: inline-block;
  margin-right: 20px;
}
a{
  text-decoration: none;
}

.container {
  max-width: 960px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

.btn-group {
  margin-bottom: 20px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  margin-right: 10px;
}

.btn:hover {
  background-color: #3e8e41;
}

.btn-danger {
  background-color: #f44336;
}

.btn-danger:hover {
  background-color: #c62828;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.action-btns {
  display: flex;
  justify-content: space-between;
}

.action-btns a {
  display: inline-block;
  padding: 5px 10px;
  background-color: #4CAF50;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  margin-right: 5px;
}

.action-btns a:hover {
  background-color: #3e8e41;
}

.action-btns .btn-view {
  background-color: #2196F3;
}

.action-btns .btn-view:hover {
  background-color: #0d47a1;
}

.action-btns .btn-edit {
  background-color: #FFC107;
}

.action-btns .btn-edit:hover {
  background-color: #FF8F00;
}

.action-btns .btn-delete {
  background-color: #f44336;
}

.action-btns .btn-delete:hover {
  background-color: #c62828;
}

</style>
</head>
<body>
    <header>
        <h1>Admin Page</h1>
        <p>Welcome, Admin!</p>
    </header>
    <nav>
        <ul>
            <li><a href="book-list.php">Book</a></li>
            <li><a href="user-list.php">User</a></li>
            <li><a href="backup.php">Backup</a></li>
            <li><a href="profile_admin.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <h2>Book List</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo $book['Title']; ?></td>
                    <td><?php echo $book['Author']; ?></td>
                    <td><?php echo $book['Price']; ?></td>
                    <td><?php echo $book['Description']; ?></td>
                    <td><?php echo $book['Image']; ?></td>
                    <td>
                        <a href="edit_book.php">Edit</a>
                        <a href="delete_book.php">Delete</a>
                        <a href="view_book.php">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        &copy; 2023 by MyLibrary
    </footer>
</body>
</html>