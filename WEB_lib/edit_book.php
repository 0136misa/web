<!DOCTYPE html>
<html>
<head>
	<title>Edit Book</title>
</head>
<body>
	<h2>Edit Book</h2>
	<?php
	include 'db.php';
    session_start();

	$title = $_GET["Title"];

	$sql = "SELECT * FROM tblBook WHERE Title='$title'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
	    $row = mysqli_fetch_assoc($result);
	    $author = $row["Author"];
	    $price = $row["Price"];
	    $description = $row["Description"];
	    $image = $row["Image"];

	    echo "<form method='post' action='edit_book.php' enctype='multipart/form-data'>";
	    echo "<input type='hidden' name='title' value='$title'>";
	    echo "<label>Author:</label>";
	    echo "<input type='text' name='author' value='$author' required><br><br>";
	    echo "<label>Price:</label>";
	    echo "<input type='number' name='price' value='$price' min='0' required><br><br>";
	    echo "<label>Description:</label>";
	    echo "<textarea name='description' rows='5' cols='40' required>$description</textarea><br><br>";
	    echo "<label>Image:</label>";
	    echo "<input type='file' name='image'><br><br>";
	    echo "<img src='$image' width='100' height='100'><br><br>";
	    echo "<input type='submit' value='Save'>";
	    echo "</form>";

	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	        $author = $_POST["author"];
	        $price = $_POST["price"];
	        $description = $_POST["description"];

	        if ($_FILES["image"]["name"] != "") {
	            $target_dir = "uploads/";
	            $target_file = $target_dir . basename($_FILES["image"]["name"]);
	            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
	                $image = $target_file;
	            } else {
	                echo "Error uploading image";
	            }
	        } else {
	            $image = $row["Image"];
	        }

	        $sql = "UPDATE tblBook SET Author='$author', Price=$price, Description='$description', Image='$image' WHERE Title='$title'";
            if (mysqli_query($conn, $sql)) {
                echo "Book updated successfully";
            } else {
                echo "Error updating book: " . mysqli_error($conn);
            }
    
            mysqli_close($conn);
        }
    } else {
        echo "Error retrieving book information";
    }
    
    mysqli_close($conn);
    ?>
    </body>
    </html>