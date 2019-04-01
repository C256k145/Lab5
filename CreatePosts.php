<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "mysql.eecs.ku.edu";
$dbUsername = "c256k145";
$password = "aYohdei9";
$dbName = "c256k145";

$userName = $_POST["userName"];
$content = $_POST["content"];
$conn = new mysqli($servername, $dbUsername, $password, $dbName);

if ($conn->connect_errno) {
  echo("Connection failed: " . $conn->connect_error);
  exit();
}
else {
    echo("Connection successful ");
}

$authID = "SELECT user_id from Users where user_id='$userName'";
if(mysqli_num_rows($conn->query($authID)) != 1) {
  echo("<script>alert('User does not exist, please enter a valid userName');window.location.href = '/~c256k145/Lab5/CreatePosts.html'</script>");
}
else {
  $postIDQuery = "SELECT * from posts";
  $posts = $conn->query($postIDQuery);
  $postID = mysqli_num_rows($posts);
  $postID = $postID + 1;
  $contentQuery = "INSERT INTO posts (post_id, author_id, content) VALUES ('$postID','$userName','$content')";
}

if($conn->query($contentQuery) != FALSE) {
  echo "<br>","New message saved sucessfully","<br>";
}
else {
  echo "<br>", "error saving message" . $contentQuery . "<br>" . $conn->error;
}

$conn->close();
?>
