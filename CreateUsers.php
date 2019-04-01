<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "mysql.eecs.ku.edu";
$dbUsername = "c256k145";
$password = "aYohdei9";
$dbName = "c256k145";

$username = $_POST["userName"];
$conn = new mysqli($servername, $dbUsername, $password, $dbName);

if ($conn->connect_errno) {
  echo("Connection failed: " . $conn->connect_error);
  exit();
}
else {
    echo("Connection successful ");
}

$userNameQuery = "INSERT INTO Users (user_id) VALUES ('$username')";
$existingID = "SELECT user_id from Users where user_id='$username'";

if(mysqli_num_rows($conn->query($existingID)) === 1) {
  echo "<br>", "Users already exists, please go back and enter a new username";
  echo "<script>alert('User Already Exists');window.location.href = '/~c256k145/Lab5/CreateUsers.html'</script>";
}
else {
  if($conn->query($userNameQuery) != FALSE ) {
    echo "<br>","New user created sucessfully"," <br>";
  }
  else{
    echo "<br>", "error adding user" . $userNameQuery . "<br>" . $conn->error;
  }
}

$conn->close();
?>
<form action = "CreatePosts.html">
  <input type="submit" value="Compose Message"></input>
</form>
