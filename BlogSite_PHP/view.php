<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>blog and more.</title>
</head>
<body>
    <?php
        if (isset($_GET['blog_id'])) {
            $blog_id = $_GET['blog_id'];
            $query="SELECT * FROM blogs WHERE id = {$blog_id}";
            $view_blog= mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($view_blog)){
                $id = $row['id'];
                $title = $row['title'];
                $author = $row['author'];
                $topic = $row['topic'];
                $info = $row['info'];
                $date = $row['date'];
                echo "<div class='box'>";
                echo "<p class='topic'>{$topic}</p>";             
                echo "<h4><b>{$title}</b></h4>";
                echo "<p class='author'><b>By {$author}</b></p>";
                echo "<p class='text'>{$info}</p>";
                echo "<p class='date'>{$date}</p>";
                echo "</div>";
                echo "<a href='update.php?edit_blog_id={$id}' class='edit'>Edit</a>";
                echo "<a href='delete.php?delete={$id}' class='delete'>Delete</a>";
            }
        }
    ?>
</body>
</html>