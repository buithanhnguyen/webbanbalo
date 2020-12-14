<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$balo1trang=6;

try {
  $conn = new PDO("mysql:host=$servername;dbname=bbackpack", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn -> query('set names utf8');
  echo "<div hidden>Connection successfully!!! </div>";
} catch(PDOException $e) {
  echo "<div hidden>Connection failed: ". $e->getMessage().'</div>' ;
}
?>