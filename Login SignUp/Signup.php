<?php

$email = $password = $confirm_password = '';
$errors = array('email' => '', 'password' => '', 'confirm_password' => '');

if (isset($_POST['sign_up'])) {

   //...................... Database Connection ..............................
   include("../Includes/Database Connection/database_connection.php");

   //................ Retrieve all data  from input field ...............
   $email = $_POST['email'] ?? '';
   $password = $_POST['password'] ?? '';
   $confirm_password = $_POST['confirm_password'] ?? '';

   //.............. All input field validation checking ...................

   // check email
   if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) { // Format check

      $errors['email'] = "Invalid email format.";
   } else {

      $domain = substr(strrchr($email, "@"), 1);

      if (!checkdnsrr($domain, 'MX')) { // Domain check

         $errors['email'] = "Email domain is not valid.";
      } else {

         // Duplication checking for email
         $stmt = $conn->prepare('SELECT IF(EXISTS(SELECT 1 FROM user_info WHERE email = ?), 1, 0) AS email_exists');
         $stmt->bind_param('s', $mail);
         $stmt->execute();
         $stmt->bind_result($emailExists);
         $stmt->fetch();
         $stmt->close();

         if ($emailExists == 1) {
            $errors['email'] = 'Sorry, this email is already registered! Please use a different one.';
         }
      }
   }

   //check password
   if (strlen($password) < 8) {
      $errors['password'] = 'Password length(8-20)';
   }

   // check confirm password
   if (!empty($password) && $confirm_password !== $password) {
      $errors['confirm_password'] = "Passwords do not match!";
   }

   if (!array_filter($errors)) {

      $stmt = $conn->prepare('INSERT INTO user_info (email, password) VALUES (?, ?)');
      $stmt->bind_param('ss', $email, $password);
      $stmt->execute();

      $stmt->close();
      mysqli_close($conn);

      header('Location: Login.php');
      exit();
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Sign Up</title>
   <link rel="stylesheet" href="signup.css" />
   <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet" />
   <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet" />
</head>

<body>
   <div class="wrapper">
      <form action="Signup.php" method="post">
         <h1>Signup</h1>

         <!-- this will have to be deleted, Mahbub -->
         <div class="input-box">
            <input type="text" name="" id="" placeholder="Username" required />
            <i class="bx bxs-user"></i>
         </div>

         <div class="input-box">
            <input type="text" name="email" id="" placeholder="Email" value="<?php echo htmlspecialchars($email) ?>" required />
            <i class="bx bx-envelope"></i>
         </div>

         <div class="input-box">
            <input type="password" name="password" id="" placeholder="Password" required />
            <i class="bx bxs-lock-alt"></i>
         </div>

         <div class="input-box">
            <input
               type="password"
               name="confirm_password"
               id=""
               placeholder="Confirm Password"
               required />
            <i class="bx bxs-lock-alt"></i>
         </div>

         <div>
            <button class="btn" type="submit" name="sign_up">Sign Up</button
               </div>

            <div class="sign-link">
               <p>Already have an account?<a href="Login.php">Sign in</a></p>
            </div>

            <button class="g-btn"><i class='bx bxl-google'></i></button>
      </form>
   </div>
</body>

</html>