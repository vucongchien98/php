<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<?php 
$host = "localhost";
$user = "root";
$password = "123";
$database = "demo_db";
$con = mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_error()){
    echo "connection failed: " . mysqli_connect_error();exit;
}
?>
</html>

