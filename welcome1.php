<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("demo2.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<div style="margin-top:20%;">
    <?php echo "<h1>Welcome to E-WET MART</h1>"; ?>
    <a href="demo2.php">Click Here to Login</a></div>
    <style>
        body{
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
    url(login-page-photo.jpg);
  height:20vh;
  background-size: cover;
  max-width: 1200px;
  margin: 20px;
  color:white;
  font-family: Century Gothic;
  text-align:center;

        }
         a{
             color:white;
             font-size:18px;
        }
        h1{
            font-size: 3rem;
        }
        </style>
</body>
</html>