<?php
// database connection
$servername = "ganesa";
$username = "nubc3594_nubisub";
$password = "henkus18072001";
$dbname = "nubc3594_recipe";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "recipe";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();  
}
?>