<?php
    include('db.php');
    session_start();
    $email_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"SELECT fname, lname FROM users WHERE email = '$email_check'");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $login_session = "$fname $lname" ;
   if(!isset($_SESSION['login_user'])){
      header("location: ");
      die();
   }
?>