<?php
require("connect.php");
$id = $_POST['id'];
$sql = "DELETE FROM product WHERE id = '$pdid'";
pg_query($conn,$sql); 
header("Location: sanpham.php");
?>
