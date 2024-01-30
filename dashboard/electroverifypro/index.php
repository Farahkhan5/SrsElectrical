<?php 
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="index.php" method="post">
        <h2>Log in</h2>
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="login" value="Log in" id="">
    </form>
</body>
</html>
<?php
    if(isset($_POST["login"]))
    {
        try{
            if(!empty($_POST["username"]) && !empty($_POST["password"]))
            {
                //get username and password
                $username = $_POST["username"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $fetch = "SELECT * FROM `users`";
                $result = mysqli_query($conn, $fetch);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if($username == row["username"] && $password == row["password"]){
                        echo "matched";
                    }
                    else{echo "unmatched";}
                }               
                // $user_reg = "INSERT INTO users(username , password) VALUES ('$username' , '$password')";
                // mysqli_query($conn, $user_reg);
                // // echo "You are Signed Up!";
                // header("Location:user_profiles.php");
                
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