<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "mysql.eecs.ku.edu";
$dbUsername = "c256k145";
$password = "aYohdei9";
$dbName = "c256k145";
$conn = new mysqli($servername, $dbUsername, $password, $dbName);

foreach($_POST as $key => $value) {
  $delete = "DELETE from posts where post_id='$key'";
  $conn->query($delete);
  echo ("<br>Deleted post:". $key);
}
?>
