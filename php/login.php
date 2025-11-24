<?php
include('db_connect.php');
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
     $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
   $result = mysqli_query($conn, $sql);
       $check_user = "SELECT * FROM users WHERE username='$username'";
    $user_result = mysqli_query($conn, $check_user);

    // Check password only
    $check_pass = "SELECT * FROM users WHERE password='$password'";
    $pass_result = mysqli_query($conn, $check_pass);
    
    
    if (mysqli_num_rows($result) > 0) {
        header("Location: welcome.php?user=" . urlencode($username));
        exit();
    } elseif (mysqli_num_rows($user_result) > 0) {
        $message = "Incorrect password.";
    } elseif (mysqli_num_rows($pass_result) > 0) {
        $message = "Incorrect username.";
    } else {
        $message = "Invalid username and password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            text-align: center;
            margin-top: 100px;
        }
        form {
            background-color: #fff;
            display: inline-block;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input[type="text"],
        input[type="password"] {
            padding: 8px;
            width: 200px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .msg {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
        <p class="msg"><?php echo $message; ?></p>
    </form>
</body>
</html>

