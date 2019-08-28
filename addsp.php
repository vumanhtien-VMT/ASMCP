<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="add.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="dau">
        <h1>TOYS SHOP</h1>
        <div class="menu">
            
        </div>
    </div>
	<div class="than">
        <h1>Adding Product Form</h1>
        <div class="table">
            <?php 
            require("connect.php");   
            if(isset($_POST["submit"]))
                {
                    $name = $_POST["name"];
                    $price = $_POST["price"];
                    $description = $_POST["description"];
                    if ($name == ""||$price == ""|| $description == "") 
                        {
                            ?>
                            <script>
                                alert("Product information should not be blank!!");
                            </script>
                            <?php
                        }
                    else
                        {
                            $sql = "select * from product where name='$name'";
                            $query = pg_query($conn, $sql);
                            if(pg_num_rows($query)>0)
                            {
                            ?> 
                                <script>
                                    alert("The product is available!!");
                                </script>
                            <?php
                            }
                            else
                            {
                                $sql = "INSERT INTO product(name, price, description) VALUES ('$name','$price','$description')";
                                pg_query($conn,$sql);
                                ?> 
                                    <script>
                                        alert("Added successful!");
                                        window.location.href = "/sanpham.php";
                                    </script>
                                <?php
                            }
                        }
                }
                 ?>
            <form action="addsp.php" method="Post">
                <input type="text" class="ad" name="name" placeholder="Name"> <br>
                <input type="text" class="ad" name="price" placeholder="Price"> <br>
                <input type="text" class="ad" name="description" placeholder="Description"> <br>
                <button type="submit" value="Add" name="submit">Add</button>
            </form>

             <button><a href="sanpham.php">Back</a></button>
        </div>
    </div>
        
    </div>
</body>
</html>