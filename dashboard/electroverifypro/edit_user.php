<?php 
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="edit_user.php" method="post">
    <?php
    if(isset($_GET["editid"])){
        $id = $_GET["editid"];
        $fetch = "SELECT * FROM `users` WHERE id=$id;";
        $result = mysqli_query($conn,$fetch);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
        $id = $row["id"];
        $username = $row["username"];
        $password = $row["password"];
                echo'
                
                <h2>Edit User</h2>
                <input type="text" name="id" value="'.$id.'" placeholder="id">
                <input type="text" name="username" value="'.$username.'" placeholder="username">
                <input type="password" name="password" value="'.$password.'" placeholder="password">
                <input type="submit" name="edit" value="Edit" id="">
                ';
    }}
    
    }
    ?>
                </form>

</body>
</html>
<?php
    if(isset($_POST["edit"]))
    {
        try{
            if(!empty($_POST["username"]) && !empty($_POST["password"]))
            {
                //get username and password
                $id1 = $_POST["id"];
                $username1 = $_POST["username"];
                $password1 = password_hash($_POST["password"], PASSWORD_DEFAULT);
                // echo $username . "<br>". $password;
                //save it on database
                $sql = "UPDATE users SET username = '$username1', password = '$password1' WHERE id = $id1";
                mysqli_query($conn,$sql);
                // echo "You are Signed Up!";
                header("Location:user_profiles.php");
                
            }
            else{
                echo "missing username/password";
            }
        }
        //for duplicate username error(username is unique)
        catch(mysqli_sql_exception){
            echo "this username is already taken";
        }
    }

    mysqli_close($conn);
?>