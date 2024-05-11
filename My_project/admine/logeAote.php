<?php
session_start();

$_SESSION['first_name'] = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$_SESSION['last_name'] = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$_SESSION['email'] = isset($_POST['email']) ? $_POST['email'] : '';
$_SESSION['phone_number'] = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
$_SESSION['CIN'] = isset($_POST['CIN']) ? $_POST['CIN'] : '';
$_SESSION['password'] = isset($_POST['password']) ? $_POST['password'] : '';





$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'matchbooking';
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn){
    die("connection faild : ".mysqli_connect_error());
}

$insert = "INSERT INTO admin ( first_name , last_name , email , phone_number , CIN , password ) VALUES (?, ?, ?, ?, ?, ?)" ;
$stmt = mysqli_prepare($conn , $insert);

if ($stmt) {

    mysqli_stmt_bind_param($stmt , "ssssss" , $_SESSION['first_name'] , $_SESSION['last_name'] , $_SESSION['email'] , $_SESSION['phone_number'] , $_SESSION['CIN'] , $_SESSION['password'] );


    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        echo "User registered successfully.";
        echo "<a href=\"login.html\">Save</a>"; 
    } else {
        echo "Failed to register user: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
} else {
    echo "Failed to prepare statement: " . mysqli_error($conn); 
}



mysqli_close($conn);



?>