

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php</title>
</head>
<body>
<?php 

$name = $_POST["usrname"];
echo "<br>";
$spass = $_POST["psw"];
$hash = password_hash($spass,  
          PASSWORD_DEFAULT); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO student_record (student_Name,student_Password)
VALUES ('$name', '$hash')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
    
</body>
</html>
