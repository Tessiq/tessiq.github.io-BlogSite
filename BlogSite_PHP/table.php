<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BlogsDB ";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE Blogs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(30) NOT NULL,
email  VARCHAR(30) NOT NULL,
pass VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  echo "Table Blogs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>