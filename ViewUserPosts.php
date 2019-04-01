<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "mysql.eecs.ku.edu";
$dbUsername = "c256k145";
$password = "aYohdei9";
$dbName = "c256k145";
$conn = new mysqli($servername, $dbUsername, $password, $dbName);

$userName = $_POST["userID"];
$post = "SELECT author_id, content from posts where author_id='$userName' ";
$result = $conn->query($post);
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo $row["content"]. "<br><br>";
  }
}
else {
  echo "This user has no posts";
}

$conn->close();
?>
