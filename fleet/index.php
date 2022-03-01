<?php
//to connect to the database
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <link rel="stylesheet" href="dist/css/app.css">
    <title>Login</title>
</head>
<body>
<div class="card">
   <form method="POST" action="">
      <h2 class="title"> Log in</h2>

      <div class="email-login">
         <label for="email" > <b>Email</b></label>
         <input type="text" placeholder="Enter Email" size="30" name="email" required>
         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" size="30" name="password" required>
      </div>
      <button class="cta-btn" name="submit" type="submit">Log In</button>
   </form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){ // if the submit button is clicked
   $email = $_POST['email'];
   $password = $_POST['password'];


   $sql = "SELECT * FROM `login` WHERE email = '$email'";
   $q = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($q);
   if($row){
      if($row['password'] == md5($password)){ // if the password is correct
         $_SESSION['email'] = $email; // set the session
         header("location: user.php"); // redirect to the user page
      }
      else{
         echo "<script>alert('Wrong password'); </script>"; // wrong password is entered
      }
   }
   else{
      echo "<script>alert('Wrong email'); </script>";    // wrong email is entered

   }
}
?>