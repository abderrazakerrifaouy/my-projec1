<?php
session_start();

$_SESSION['first_name'] = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$_SESSION['last_name'] = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$_SESSION['email'] = isset($_POST['email']) ? $_POST['email'] : '';
$_SESSION['phone_number'] = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
$_SESSION['CIN'] = isset($_POST['CIN']) ? $_POST['CIN'] : '';
$_SESSION['password'] = isset($_POST['password']) ? $_POST['password'] : '';


echo $_SESSION['first_name'];
echo $_SESSION['last_name'];
echo "jkrfiurb";



$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'matchbooking';
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn){
    die("connection faild : ".mysqli_connect_error());
}

$insert = "INSERT INTO usr ( first_name , last_name , email , phone_number , CIN , password ) VALUES (?, ?, ?, ?, ?, ?)" ;
$stmt = mysqli_prepare($conn , $insert);

if ($stmt) {

    mysqli_stmt_bind_param($stmt , "ssssss" , $_SESSION['first_name'] , $_SESSION['last_name'] , $_SESSION['email'] , $_SESSION['phone_number'] , $_SESSION['CIN'] , $_SESSION['password'] );


    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}
mysqli_close($conn);



?>