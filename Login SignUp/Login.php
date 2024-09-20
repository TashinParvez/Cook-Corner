<?php

$email = $password = '';
$error = '';

if (isset($_POST['login'])) {

   //................ Retrieve data from input field ...............
   $email = $_POST['email'] ?? '';
   $password = $_POST['password'] ?? '';

   if (empty($_POST['email']) || empty($_POST['password'])) {

      $error = 'Invalid email or password.';
   } else {

      //...................... Database Connection ..............................
      include("../Includes/Database Connection/database_connection.php");

      $stmt = $conn->prepare('SELECT id, password FROM user_info WHERE email = ? LIMIT 1');
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $stmt->bind_result($id, $stored_password);

      if ($stmt->fetch()) {

         if (password_verify($password, $stored_password)) {

            session_start();
            $_SESSION['id'] = $id;

            $stmt->close();
            mysqli_close($conn);

            header('Location: Homepage.php');
            exit();
         } else {
            $error = "Invalid email or password.";
         }
      } else {
         $error = "Invalid email or password.";
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Login</title>
   <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

   <!-- favicon -->
   <link rel="icon" href="../Images/logo/fav-icon.png" />

   <link rel="stylesheet" href="login.css" />
</head>

<body>
   <div class="wrapper">
      <form action="Login.php" method="post">
         <h1>Login</h1>
         <div class="input-box">
            <input type="text" name="email" id="" placeholder="Email" value="<?php echo htmlspecialchars($email) ?>" />
            <i class="bx bxs-user"></i>
         </div>
         <div class="input-box">
            <input type="password" name="password" id="" placeholder="Password" />
            <i class="bx bxs-lock-alt"></i>
         </div>
         <div class="remember-forget">
            <label for="int"><input type="checkbox" name="" id="int" />Remember me</label>
            <a href="#">Forgot Password?</a>
         </div>

         <div>
            <button class="btn" type="submit" name="login">Login</button>
         </div>
         <div class="reg-link">
            <p>Don't have an account?<a href="Signup.php">Register</a></p>
         </div>
      </form>
   </div>
</body>

</html>