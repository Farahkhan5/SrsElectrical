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
    <form action="edit_test.php" method="post">
    <?php
    if(isset($_GET["editid"])){
        $id = $_GET["editid"];
        $fetch = "SELECT * FROM `testing` WHERE id=$id;";
        $result = mysqli_query($conn,$fetch);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
        $id = $row["id"];
        $p_name = $row["p_name"];
        $product_id = $row["product_id"];
        $testing_id = $row["testing_id"];
        $image = $row["image"];
        $result = $row["result"];

                echo'
                
                <h2>Edit Test Product Info</h2>
                <input type="text" name="id" value="'.$id.'" placeholder="id">
                <input type="text" name="p_name" value="'.$p_name.'" placeholder="Product Name">
                <input type="number" name="product_id" value="'.$product_id.'" placeholder="Product ID">
                <input type="number" name="testing_id" value="'.$testing_id.'" placeholder="Testing ID">
                <input type="number" name="result" value="'.$result.'" placeholder="Result">
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
            if(!empty($_POST["p_name"]) && !empty($_POST["testing_id"]) && !empty($_POST["product_id"]) && !empty($_POST["result"]) )
            {
                //get username and password
                $id1 = $_POST["id"];
                $p_name1 = $_POST["p_name"];
                $testing_id1 = $_POST["testing_id"];
                $product_id1 = $_POST["product_id"];
                $result1 = $_POST["result"];
                // echo $username . "<br>". $password;
                //save it on database
                $sql = "UPDATE testing SET p_name = '$p_name1', product_id = '$product_id1', testing_id = '$testing_id1',result = '$result1'  WHERE id = $id1";
                mysqli_query($conn,$sql);
                // echo "You are Signed Up!";
                header("Location:testing_product.php");
            }
            else{
                echo "missing any field";
            }
        }
        //for duplicate username error(username is unique)
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    mysqli_close($conn);
?>