<?php
$servername = "localhost";
$username = "mysql";
// NOTE: Insert password here
$password = "<PASSWORD>";

try {
  $conn = new PDO("mysql:host=$servername;dbname=college", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die();
}
