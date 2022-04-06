<?php
    $id=$_GET['del_id'];
    include('../includes/connection.php');
    $del_p=mysqli_query($con,"DELETE from customers WHERE customer_id='$id'");
    if($del_p){
        echo "<script>window.open('view_all_customers.php?msg=Customers deleted successfully !','_self');</script>";
    }
    else{
        echo"<h1>Something went wrong!</h1>";
    }
?>