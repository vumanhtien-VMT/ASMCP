<?php
require("connect.php");
$id = $_POST['stt'];
$sql = "DELETE FROM product WHERE stt = '$stt'";
pg_query($conn,$sql); 
header("Location: sanpham.php");
?>
