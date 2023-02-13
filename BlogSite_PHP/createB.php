<?php include "header.php" ?>
<?php include('session.php'); ?>
<?php
if(isset($_POST['create'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $topic = $_POST['topic'];
    $info = $_POST['info'];
    $date = date('Y/m/d H:i:s');
    $query="INSERT INTO blogs(title, author, topic, info, date) VALUES('{$title}','{$author}','{$topic}','{$info}','{$date}')";
    $add_blog = mysqli_query($conn,$query);
    if(!$add_blog){
        echo "something went wrong". mysqli_connect_error($conn);
    }
    else {
        header("Location: home.php");
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
        <h3>Create Blog</h3>
        <form action="" method="post">
            <div>
                <label for="title" class="form-label">Title:</label>
                <br>
                <input type="text" name="title" class="form-input" required>
            </div>
            <div>
                <label for="author" class="form-label">Author:</label>
                <br>
                <input type="text" name="author" class="form-input" value="<?php echo $login_session;?>" required>
            </div>
            <div>
                <label for="topic" class="form-label">Topic:</label>
                <br>
                <select class="form-input" name="topic" required>
                    <option value="Politics">Politics</option>
                    <option value="Tech">Tech</option>
                    <option value="Investing">Investing</option>
                    <option value="Business">Business</option>
                    <option value="Markets">Markets</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label for="info" class="form-label">Text:</label>
                <br>
                <textarea name="info" class="form-input" required></textarea>
            </div>
            <br>
            <div>
                <input type="submit" name="create" value="Post" class="form-submit">
            </div>
        </form>
    </div>
</body>
</html>