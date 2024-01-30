<?php 
include("database.php");
if(isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];
    $sql = "DELETE FROM `admins` WHERE id =$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location:admin_profiles.php");
    }
    else{
        echo"error";
    }
}
mysqli_close($conn);
?>