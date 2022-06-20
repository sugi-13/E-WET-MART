<?php
include 'config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location:demo2.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

  if($username != '' and $email != '' and $password != '' and $cpassword != ''){
	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Congrats! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
        header("Location:welcome1.php");
			} else {
				echo "<script>alert('Sorry! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Sorry! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
} else{
    echo "<script>alert('All fields are required!')</script>";
  }
}
?>


<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>E-Wet Mart - Signup</title>
    <meta name="robots" content="index,follow" />
    <meta
      name="Description"
      content="A single place to connect with local producers of veggies, fruits, meat and fisheries."
    />
    <link rel="stylesheet" href="demo.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body class="signup-page">
    <div id="logo">
      <img src="art_eatlogos_design_for_pink.png" />
    </div>
    <div class="signup-box">
      <h1>SIGN UP</h1>
      <form action="" method="POST">
        <div class="top-row">
          <div class="names">
            <i class="fas fa-user"></i>
            <input
              id="username"
              type="text"
              placeholder="Username"
              autocomplete="off"
              maxlength="24"
              name="username"
              value="<?php echo $username; ?>"
            />
          </div>
        </div>
        <div class="mail">
          <i class="fas fa-envelope"></i>
          <input
            id="email"
            type="email"
            placeholder="Email"
            autocomplete="off"
            name="email"
            value="<?php echo $email; ?>"
          />
        </div>
        <div class="password">
          <i class="fas fa-key"></i>
          <input
            id="pass"
            type="password"
            placeholder="Password"
            autocomplete="off"
            maxlength="16"
            name="password"
            value="<?php echo $_POST['password']; ?>"
          />
        </div>
        <div class="password2">
          <i class="fas fa-key"></i>
          <input
            id="confirmpass"
            type="password"
            placeholder="Confirm Password"
            autocomplete="off"
            maxlength="16"
            name="cpassword"
            value="<?php echo $_POST['cpassword']; ?>" 
          />
        </div>

        <input type="submit" name="submit" id="submit-btn" value="Sign Up" />
        <br>
        
        <p class="log"><a href="demo2.php"
            >Already have an account? Log in</a></p>
      </form>
    </div>
  </body>
</html>
