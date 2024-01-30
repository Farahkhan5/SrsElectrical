<!-- <?php 
include("database.php");
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="add_product.php" method="post">
        <h2>Add a New Product</h2>
        <input type="text" name="p_name" placeholder="Product Name"><br>
        <input type="number" name="price" placeholder="Price"><br>
        <!-- <input type="file" name="image" placeholder="Image"><br> -->
        <input type="submit" name="add" value="Add">
    </form>
</body>
</html>
<?php
    if(isset($_POST["add"]))
    {
        try{
            if(!empty($_POST["p_name"]) && !empty($_POST["price"])
            //  && !empty($_POST["image"])
            )
            {
                $p_name = $_POST["p_name"];
                $price = $_POST["price"];
                $product_id = mt_rand(1000000000,9999999999);
                // var_dump($product_id);
                $add_product = "INSERT INTO  products(p_name,price,product_id) VALUES ('$p_name',$price,$product_id)";
                mysqli_query($conn,$add_product);
                header("Location:product_management.php");
            }
            else{
                echo "Missing Product Name/Price";
            }
        }
        //for duplicate username error(username is unique)
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    mysqli_close($conn);
?>