<?php include ('header.php'); ?>
<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>blog and more.</title>
</head>
<body>
    <h2 class="head">Blogs</h2>
    <?php
        $query="SELECT * FROM blogs";
        $view_blogs = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($view_blogs)){
            $id = $row['id'];
            $title = $row['title'];
            $author = $row['author'];
            $topic = $row['topic'];
            $info = $row['info'];
            $date = $row['date'];
            $S_title = mb_strimwidth($title, 0, 30, "...");
            $S_info = mb_strimwidth($info, 0, 100, "...");
            echo "<div class='box'>";
            echo "<a href='view.php?blog_id={$id}' class='anchor'><p class='topic'>{$topic}</p>";             
            echo "<h4><b>{$S_title}</b></h4>";
            echo "<p class='author'><b>By {$author}</b></p>";
            echo "<p class='text'>{$S_info}</p>";
            echo "<p class='date'>{$date}</p></a>";
            echo "</div>";
        }
    ?>
    <br>
    <button type="button" class="out" onclick="window.location.href='http://localhost:8081/BlogSite_PHP/logout.php';">Sign Out</button>
</body>
</html>