<?php
require("connect.php");
$id = $_POST['stt'];
$sql = "DELETE FROM toys WHERE stt = '$stt'";
pg_query($conn,$sql); 
header("Location: sanpham.php");
?>
