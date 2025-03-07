<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Registration</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  require('db.php');
  // When form submitted, insert values into the database.
  if (isset($_REQUEST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $createdatetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `user` (username, password, email, createdatetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$createdatetime')";
    $result = mysqli_query($con, $query);
    if ($result) {
      echo "<div class='form'>
                  <h3>You are sign up successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
    } else {
      echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
    }
  } else {
  ?>
    <div class="form-login">
      <form class="form" action="" method="post">
        <h1 class="login-title">Sign Up</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Sign up" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
      </form>
    </div>
  <?php
  }
  ?>
</body>

</html>