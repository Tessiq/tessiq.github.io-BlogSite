<?php include "header.php" ?>
<?php include "db.php" ?>
<?php
if(isset($_POST['create'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $sql = "SELECT email from users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo "<p class='error'>Email already exists</p>";
    }
    else {
        if($pass1 === $pass2){
        $query="INSERT INTO users(fname, lname, email, pass) VALUES('{$fname}','{$lname}','{$email}','{$pass2}')";
        $add_user = mysqli_query($conn,$query);
        if(!$add_user){
            echo "something went wrong". mysqli_connect_error($conn);
        }
        else {
            header("Location: index.php");
        }
    }
    else {
        echo "<p class='error'>Password does not match</p>";
    }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/create.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>blog and more.</title>
</head>
<body>
    <div class="container">
        <h3>Create An Account</h3>
        <form action="" method="post">
            <div>
                <label for="fname" class="form-label">First Name:</label>
                <br>
                <input type="text" name="fname" class="form-input" required>
            </div>
            <div>
                <label for="lname" class="form-label">Last Name:</label>
                <br>
                <input type="text" name="lname" class="form-input" required>
            </div>
            <div>
                <label for="email" class="form-label">Email:</label>
                <br>
                <input type="text" name="email" class="form-input" required>
            </div>
            <div>
                <label for="password1" class="form-label">Password:</label>
                <br>
                <input type="text" name="password1" class="form-input" required>
            </div>
            <div>
                <label for="password2" class="form-label">Confirm Password:</label>
                <br>
                <input type="text" name="password2" class="form-input" required>
            </div>
            <br>
            <div>
                <input type="submit" name="create" value="Create" class="form-submit">
            </div>
        </form>
    </div>
</body>
</html>