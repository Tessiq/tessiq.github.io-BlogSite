<?php
   include("db.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $sql = "SELECT id FROM users WHERE email = '$myemail' and pass = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION['login_user'] = $myemail;
         header("location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>blog and more.</title>
</head>
<body>
    <h1>blog and <br> more.</h1>
    <div id="container">
        <form action="" method="POST">
            <div>
                <p id="title"><b> Login to start blogging and more.</b></p>
                <br>
                <label class="labels">Email:</label>
                <br><br>
                <input name="email" id="email"  class="inputs" placeholder="">
                <br><br>
                <label class="labels">Password:</label>
                <br><br>
                <input name="password" id="pass" class="inputs" placeholder="">
                <br><br>
                <input id="button" type="submit" value="Sign-In">
                <br><br>
                <p id="signup">Need an account? <a href="http://localhost:8081/BlogSite_PHP/createU.php">SIGN UP</a></p>
            </div>
        </form>
    </div>
</body>
</html>
