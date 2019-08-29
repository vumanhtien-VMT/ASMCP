<?php
require("connect.php");
$id = $_POST['id'];
$sql = "DELETE FROM toys WHERE ID = '$id'";
pg_query($conn,$sql); 
header("Location: sanpham.php");
?>
