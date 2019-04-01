<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "mysql.eecs.ku.edu";
$dbUsername = "c256k145";
$password = "aYohdei9";
$dbName = "c256k145";
$conn = new mysqli($servername, $dbUsername, $password, $dbName);

$users = "SELECT * from Users";
$result = $conn->query($users);

if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "userID: " . $row["user_id"] . "<br>";
  }
}
else {
  echo "There are no users in this table";
}

$conn->close();
?>
