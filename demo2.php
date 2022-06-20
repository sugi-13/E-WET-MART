<?php

include 'config.php';

session_start();

error_reporting(0);



if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location:welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="demo2.css">

	<title>E-WET MART LOGIN</title>
</head>
<body class="login-page">
    <div id="logo"><img src="art_eatlogos_design_for_pink.png"></div>  
		<form action="" method="POST" class="login-email">
        <div class="login-box">
        <h1>LOG IN</h1>
			<div class="textbox">
            <i class="fas fa-user"></i>
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="textbox">
            <i class="fas fa-key"></i>
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<button name="submit" id="sign-in-btn">Login</button>
			
			<p class="no-account"><a href="demo.php">Don't have account? Sign up</a></p>
		</form>
	</div>
</body>
</html>