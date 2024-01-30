<?php 
include("database.php");
if(isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];
    $sql = "DELETE FROM `products` WHERE id =$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location:product_management.php");
    }
    else{
        echo"error";
    }
}
mysqli_close($conn);
?>