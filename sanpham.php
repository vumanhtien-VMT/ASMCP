<?php 
require_once './connect.php';  
if(isset($_POST["aduser"]) && isset($_POST["adpass"]))
{
	$user = $_POST["aduser"];
	$pass = $_POST["adpass"];
	$sql ="SELECT * FROM account WHERE username = '$user' AND pwd= '$pass'";
	$rows = pg_query($sql);
	if(pg_num_rows($rows)==1) { ?>
		<script>
            alert("Login successfully!!");
        </script>
    <?php
    } else { 
        ?>
            <script>
                alert("Wrong Username/Password");
                window.location.href = "/index.php";
            </script>
        <?php }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> San pham</title>
	<link rel="stylesheet" type="text/css" href="add.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
		<table class="table">
			<h1>Managing Product</h1>
			<tr>
				<th class="tet">STT</th>
				<th class="tet">Name</th>
				<th class="tet">Price</th>
				<th class="tet">Discription</th>
				<th class="tet">ID</th>
				<th class="tet">Edit</th>
			</tr>

			 <?php
            require_once 'data.php';
            $sql = "SELECT * FROM toys";
            $stmt = $pdo->prepare($sql);
            foreach ($pdo->query($sql) as $row) {
            ?>
				<tr>
	                <td class="info"><?php echo $row['stt']?></td> 
	                <td class="info"><?php echo $row['name']?></td> 
	                <td class="info"><?php echo $row['price']?></td> 
	                <td class="info"><?php echo $row['description']?></td> 
	                <td class="info"><?php echo $row['id']?></td>
	                <td class="info">
	                	<form action='delete.php' method="POST">
                            <input type='hidden' name='id' value='<?php echo $row['id']?>'>
                            <input class="edit-btn" type='submit' value='Delete'>
                        </form> <br>

                        <form action="update.php" method="POST">
                            <input type='hidden' name='stt' value='<?php echo $row['stt']?>'>
                            <input type='hidden' name='name' value='<?php echo $row['proname']?>'>
                            <input type='hidden' name='price' value='<?php echo $row['price']?>'>
                            <input type='hidden' name='description' value='<?php echo $row['description']?>'>
                            <input type='hidden' name='id' value='<?php echo $row['id']?>'>
                            <input class="edit-btn" type='submit' value='Update'>
                        </form>
	                </td>
	            </tr>
	        <?php
            }
            ?> 
        </table>
        <button><a href="addsp.php">Add Product</a></button>
	</div>
	<div class="wrapper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</body>
</html>