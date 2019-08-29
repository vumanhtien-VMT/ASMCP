<?php
require("connect.php");

$id = $_POST['stt'];
if (isset($_POST['update'])) {
	$name = $_POST["name"];
    $price = $_POST["price"];
	$description = $_POST["description"];
	$quantity = $_POST["quantity"];
	if ($name == ""|| $price == ""|| $description == ""|| $quantity == "") {
    ?>
		<script>
			alert("Product information should not be blank!!");
		</script>
		<?php
    } else {
		$sql = "select * from product where name='$name'";
		$query = pg_query($conn, $sql);
		if(pg_num_rows($query)>0) {
		?> 
			<script>
				alert("The product is available!!");
			</script>
		<?php
		} else {
			$sql = "UPDATE product SET name='$name', price='$price', description='$description', quantity='$quantity' WHERE stt='$stt'";
			$run = pg_query($conn, $sql);
			if ($run) { ?>
			<script type="text/javascript">
					alert ("Update info successfully!!");
					window.location.href = "sanpham.php";
			</script>
			<?php 
			} else { ?>
			<script type="text/javascript">
					alert ("Update product failed!!");
					window.location.href = "sanpham.php";
			</script>
			<?php } 
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="add.css">
    <title>Update</title>
</head>

<body>
	<div class="dau">
		<h1 class="ts">TOYS SHOP</h1>
		<div class="lo">
			<button><a href="index.php">Logout</a></button>
		</div>
		<div class="menu"></div>
	</div>
    <div class="than">
        <h1>Update Information</h1>
        <form action="update.php" method="POST">
			<?php
			$qry = "SELECT * FROM toys WHERE stt = '$stt'";
			$result = pg_query($conn, $qry);
			$row = pg_fetch_row($result);
			?>
			
			<input type="hidden" name="stt" value="<?= $row[0] ?>">
			<input type="text" name="name" value="<?= $row[1] ?>">
			<input type="text" name="price" value="<?= $row[2] ?>">
			<input type="text" name="description" value="<?= $row[3] ?>">
			<input type="text" name="quantity" value="<?= $row[4] ?>">

			<input type="submit" name="update" value="Update">
		</form>
        
        <button><a href="sanpham.php">Back</a></button>
		<br><br>
    </div>
    <div class="wrapper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</body>

</html>