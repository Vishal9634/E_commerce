<?php
    $id=$_GET['del_id'];
    include('../includes/connection.php');
    $del_p=mysqli_query($con,"DELETE from products WHERE product_id='$id'");
    if($del_p){
        echo "<script>window.open('view_all_products.php?msg=Product deleted successfully !','_self');</script>";
    }
    else{
        echo"<h1>Something went wrong!</h1>";
    }
?>