<?php
$id = isset($_GET["id"]) ? intval($_GET["id"]) :0;
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'matchbooking';
$conn = new mysqli($host, $user, $pass, $db);
$sql = "DELETE FROM matche WHERE id = '{$id}'";
$rs = $conn->query($sql);
if ($rs == false) {
    echo "lame tatime l3amaliya bi najahe ";
} else {
    echo"<script>window.location.href = 'index.php';</script>";
}

?>