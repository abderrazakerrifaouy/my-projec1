<?php
session_start(); 

$email = isset($_POST['email']) ? $_POST['email'] : ''; 
$password = isset($_POST['password']) ? $_POST['password'] : ''; 

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'matchbooking';
$conn = new mysqli($host, $user, $pass, $db);
$sql = " SELECT * FROM admin WHERE email = '{$email}'";
$rs = $conn->query($sql);

if ($rs && $rs->num_rows > 0 ){
    $row = $rs->fetch_assoc();
    if ($password == $row['password']) {
        $_SESSION['id'] = isset($row['id']);
        echo "<script>window.location.href = 'profaile/index.php' ; </script>" ;
    }else{
        echo "mode de base note esite ";
    }
}else{
    echo "emaile note esite";
}


?>