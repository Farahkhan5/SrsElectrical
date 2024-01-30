<!-- <?php 
include("database.php");
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Test Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="add_test_product.php" method="post">
        <h2>Add a Test Product</h2>
        <input type="number" name="product_id" placeholder="Product ID"><br>
        <input type="number" name="result" placeholder="Result"><br>
        <!-- <input type="file" name="image" placeholder="Image"><br> -->
        <input type="submit" name="add" value="Add">
    </form>
</body>
</html>
<?php
    if(isset($_POST["add"]))
    {
        try{
            if(!empty($_POST["product_id"]))
            {
                $id = $_POST["product_id"];
                $sql = "SELECT `id`, `p_name`, `price`, `product_id` FROM `products` WHERE id = $id";
                $fetch = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($fetch);

                $p_name = $row["p_name"];
                // $product_id = $row["product_id"];  
                $testing_id = mt_rand(100000000000,999999999999);
                $add_product = "INSERT INTO  testing(p_name,product_id,testing_id,result) VALUES ('$p_name', $id, $testing_id,2)";
                mysqli_query($conn,$add_product);
                header("Location:testing_product.php");
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