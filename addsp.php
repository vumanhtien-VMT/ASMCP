<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="add.css">
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
            // require("connect.php");   
            if(isset($_POST["submit"]))
                {
                    $name = $_POST["proname"];
                    $price = $_POST["price"];
                    $descrip = $_POST["descrip"];
                    if ($name == ""||$price == ""|| $descrip == "") 
                        {
                            echo "Product information should not be blank!!";
                        }
                    else
                        {
                            $sql = "select * from product where proname='$name'";
                            $query = pg_query($conn, $sql);
                            if(pg_num_rows($query)>0)
                            {
                                echo "Product is already available!!";
                            }
                            else
                            {
                                $sql = "INSERT INTO product(proname, price, descrip) VALUES ('$name','$price','$descrip')";
                                pg_query($conn,$sql);
                                echo  "Sign Up successful!!";
                            }
                        }
                }
                 ?>
            <form action="addsp.php" method="Post">
                <input type="text" width="600" height="100" name="proname" placeholder="Name"> <br>
                <input type="text" width="600" height="100" name="price" placeholder="Price"> <br>
                <input type="text" width="600" height="100" name="descrip" placeholder="Description"> <br>
                <button type="submit" value="Add" name="submit">Add</button>
            </form>

             <button><a href="sanpham.php">Back</a></button>
        </div>
    </div>
        
    </div>
</body>
</html>