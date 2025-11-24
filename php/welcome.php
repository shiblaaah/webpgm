<?php
$user = isset($_GET['user']) ? htmlspecialchars($_GET['user']) : 'Guest';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9f7ef; /* light green background */
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 150px;
            background-color: #fff;
            display: inline-block;
            padding: 50px 80px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #28a745;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            font-size: 18px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 25px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $user; ?>! 🎉</h2>
        <p>We're glad to see you back.</p>
        <a href="login.php">Logout</a>
    </div>
</body>
</html>

