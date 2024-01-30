<?php 
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sign_up.php" method="post">
        <h2>Sign UP</h2>
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="signup" value="Sign Up" id="">
    </form>
</body>
</html>
<?php
    if(isset($_POST["signup"]))
    {
        try{
            if(!empty($_POST["username"]) && !empty($_POST["password"]))
            {
                //get username and password
                $username = $_POST["username"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                // echo $username . "<br>". $password;
                //save it on database
                $user_reg = "INSERT INTO users(username , password) VALUES ('$username' , '$password')";
                mysqli_query($conn, $user_reg);
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