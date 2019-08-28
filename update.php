<?php
require("connect.php");

$id = $_POST['id'];
if (isset($_POST['update'])) {
	$name = $_POST["name"];
	$stt = $_POST["stt"];
    $price = $_POST["price"];
	$description = $_POST["description"];
	if ($name == ""|| $stt == ""|| $price == ""|| $description == "") {
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
			$sql = "UPDATE product SET name='$name', price='$price', descrip='$description' WHERE productid='$id', stt='$stt'";
			$run = pg_query($conn, $sql);
			if ($run) { ?>
			<script type="text/javascript">
					alert ("Update info successfully!!");
					window.location.href = "/sanpham.php";
			</script>
			<?php 
			} else { ?>
			<script type="text/javascript">
					alert ("Update product failed!!");
					window.location.href = "/sanpham.php";
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
    <link rel="stylesheet" href="/style.css">
    <title>Update</title>
</head>

<body>
    <div>
        <h1>Update Information</h1>
        <form action="/update.php" method="POST">
			<?php
			$qry = "SELECT * FROM product WHERE productid = '$id'";
			$result = pg_query($conn, $qry);
			$row = pg_fetch_row($result);
			?>
			<input type="hidden" name="stt" value="<?= $row[0] ?>">
			<input type="hidden" name="id" value="<?= $row[4] ?>">
			<input type="text" name="name" value="<?= $row[1] ?>">
			<input type="text" name="price" value="<?= $row[2] ?>">
			<input type="text" name="description" value="<?= $row[3] ?>">
			<input type="submit" name="update" value="Update">
		</form>
        
        <button><a href="/managing.php">Back</a></button>
		<br><br>
    </div>
</body>

</html>