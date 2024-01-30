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
    <form action="dashboard.php" method="post">
        <input type="submit" name="user_profile" value="User Profiles" id="">
    </form>
</body>
</html>
<?php
    if(isset($_POST["user_profile"])){
        header("Location:user_profiles.php");
    }

mysqli_close($conn);
?>