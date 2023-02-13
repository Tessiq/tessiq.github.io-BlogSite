<?php include 'header.php' ?>
<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $topic = $_POST['topic'];
    $info = $_POST['info'];
    $date = date('Y/m/d H:i:s');
    $query="UPDATE blogs SET title = '{$title}' , author = '{$author}' , topic= '{$topic}', info= '{$info}', date= '{$date}'WHERE id = $id";
    $update_blog = mysqli_query($conn,$query);
    if(!$update_blog){
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
    <link rel="stylesheet" href="css/update.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>blog and more.</title>
</head>
<body>
<div class="container">
    <h3>Update Blog</h3>
    <form action="" method="post">
        <?php
            if(isset($_GET['edit_blog_id'])){
                $blog_id = $_GET['edit_blog_id'];
                $query="SELECT * FROM blogs WHERE id = {$blog_id}";
                $get_blog = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($get_blog))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $topic = $row['topic'];
                    $info = $row['info'];
                    echo '<div>';
                        echo '<label for="title" class="form-label">Title:</label>';
                        echo '<br>';
                        echo "<input type='text' name='title' class='form-input' value='{$title}' required>";
                    echo '</div>';
                    echo '<div>';
                        echo '<label for="author" class="form-label">Author:</label>';
                        echo '<br>';
                        echo "<input type='text' name='author' class='form-input' value='{$author}' required>";
                    echo '</div>';
                    echo '<div>';
                        echo '<label for="topic" class="form-label">Topic:</label>';
                        echo '<br>';
                        echo '<select class="form-input" name="topic" required>';
                            echo "<option value='{$topic}'>{$topic}</option>";
                            echo '<option value="Politics">Politics</option>';
                            echo '<option value="Tech">Tech</option>';
                            echo '<option value="Investing">Investing</option>';
                            echo '<option value="Business">Business</option>';
                            echo '<option value="Markets">Markets</option>';
                            echo '<option value="Other">Other</option>';
                        echo '</select>';
                    echo '</div>';
                    echo '<div>';
                        echo '<label for="info" class="form-label">Text:</label>';
                        echo '<br>';
                        echo "<textarea name='info' class='form-input' required>{$info}</textarea>";
                    echo '</div>';
                    echo "<input type='hidden' name='id' class='form-control' value='{$id}' >";
                }
            }
            else {
                echo 'error';
            }
        ?>
        <br>
        <div>
            <input type="submit" name="update" value="Save" class="form-submit">
        </div>
    </form>
    </div>
</body>
</html>