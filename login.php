<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: loggedin.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        // echo "<script>alert('Selamat, login berhasil!')</script>";
        header("Location: loggedin.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
 <!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link rel="preload" as="style"
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
   <title>Login Form</title>
</head>

<body>
    
   <section class="login-section">
      <div class="card-login">
        <h3>TripKUY</h3>
         <!-- login form -->
         <form class="form" action="" method="post">
            <div class="form-group">    
               <label for="text">Username</label>
               <input type="text" class="form-input" name="username" placeholder="Enter your username" id="text">
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-input" name="password" placeholder="Enter your password" id="password">
            </div>
            <button type="submit" name="submit" class="btn">Log in</button>
         </form>
      </div>
      <!-- Text create account -->
      <p class="text-create-account">Don't have an account? <a href="register.php" class="text-sign-up">Register</a></p>
   </section>

</body>

</html>