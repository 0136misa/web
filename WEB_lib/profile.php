<?php
session_start();
include 'db.php';

// Prepare a select statement to fetch user information from database
$stmt = $conn->prepare("SELECT Fullname, Username, Email, Avatar FROM tblUser WHERE UserId = ?");
$stmt->bind_param("i", $param_id);
$param_id = $_SESSION["user"];
$stmt->execute();
$stmt->bind_result($fullname, $username, $email, $avatar);
$stmt->fetch();

// Handle profile updates
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["update"])){
        $new_fullname = trim($_POST["Fullname"]);
        $new_email = trim($_POST["Email"]);
        $sql = "UPDATE tblUser SET Fullname = ?, Email = ? WHERE UserId = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssi", $new_fullname, $new_email, $_SESSION["UserId"]);
        mysqli_stmt_execute($stmt);
        $_SESSION["Fullname"] = $new_fullname;
        $_SESSION["Email"] = $new_email;
        header("Refresh:0");
    } elseif(isset($_POST["change_password"])){
        // Redirect to change password page
        header("location: change_password.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #profile {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f1f1f1;
        }
        #profile-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 600px;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        #avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 30px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type=text], input[type=password] {
            padding: 5px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: #f1f1f1;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="profile">
        <div id="profile-card">
            <h1>Profile</h1>
            <form action="update_profile.php" method="post" enctype="multipart/form-data">
                <img src="<?php echo $avatar; ?>" alt="Avatar" id="avatar">
                <label for="avatar">Change Avatar:</label>
                <input type="file" id="avatar" name="avatar">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" disabled>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <input type="submit" name="update" value="Update Profile">
            </form>
            <form action="change_password.php">
                <input type="submit" name="change_password" value="Change Password">
            </form>
        </div>
    </div>
</body>
</html>