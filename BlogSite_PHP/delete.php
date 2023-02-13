<?php include "header.php" ?>
<?php 
     if(isset($_GET['delete']))
     {
         $blog_id= $_GET['delete'];
         $query = "DELETE FROM blogs WHERE id = $blog_id"; 
         $delete_query= mysqli_query($conn, $query);
         header("Location: home.php");
     }
?>