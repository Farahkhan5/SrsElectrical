<?php
include("database.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product Management</title>
  </head>
   <body>
      <div class="container mt-5">
         <h1 class="text-center">Product Management</h1>
         <a class="btn btn-primary container" href="add_product.php">Add Product</a>
      <!-- table -->
      <table class="table table-striped table-hover">
         <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Product ID</th>
            <th scope="col">Image</th>
            <th scope="col">Operation</th>
         </tr>
         </thead>
   <tbody>
<?php
    // to fetch all users from database
 $fetch = "SELECT * FROM `products`";
 $result = mysqli_query($conn, $fetch);
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        echo 
        "<tr>
         <td scope='row'>".$row["id"]."</td>
         <td>".$row["p_name"]."</td>
         <td>$".$row["price"]."</td>
         <td>".$row["product_id"]. "</td>
         <td>".$row["image"]. "</td>
         <td><a class='btn btn-primary' href='edit_product.php?editid=".$row["id"]."'>Edit</a>
         <a class='btn btn-danger' href='delete_product.php?deleteid=".$row["id"]."'>Delete</a></td>
         </tr>";
    }
 }
 else {
    echo "no product found";
 }
?>
   </tbody>
      </table>
      </div>
   </body>
</html>
<?php
  mysqli_close($conn);
?>