<?php 
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="edit_product.php" method="post">
    <?php
    if(isset($_GET["editid"])){
        $id = $_GET["editid"];
        $fetch = "SELECT * FROM `Products` WHERE id=$id;";
        $result = mysqli_query($conn,$fetch);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
        $id = $row["id"];
        $p_name = $row["p_name"];
        $price = $row["price"];
                echo'
                
                <h2>Edit Product Info</h2>
                <input type="text" name="id" value="'.$id.'" placeholder="id">
                <input type="text" name="p_name" value="'.$p_name.'" placeholder="Product Name">
                <input type="number" name="price" value="'.$price.'" placeholder="Price">
                <input type="submit" name="update" value="Update" id="">
                ';
    }}
    
    }
    ?>
                </form>

</body>
</html>
<?php
    if(isset($_POST["update"]))
    {
        try{
            if(!empty($_POST["p_name"]) && !empty($_POST["price"]) 
            // && !empty($_POST["product_id"])
        )
            {
                //get username and password
                $id1 = $_POST["id"];
                $p_name1 = $_POST["p_name"];
                $price1 = $_POST["price"];
                // $product_id1 = $_POST["product_id"];
                // echo $username . "<br>". $password;
                //save it on database
                $sql = "UPDATE products SET p_name = '$p_name1', price = '$price1' WHERE id = $id1";
                mysqli_query($conn,$sql);
                // echo "You are Signed Up!";
                header("Location:product_management.php");
                
            }
            else{
                echo "missing Product Name/Price";
            }
        }
        //for duplicate username error(username is unique)
        catch(mysqli_sql_exception){
            echo "error";
        }
    }

    mysqli_close($conn);
?>