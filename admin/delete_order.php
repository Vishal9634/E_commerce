<?php
    $id=$_GET['del_id'];
    include('../includes/connection.php');
    $del_p=mysqli_query($con,"DELETE from pending_orders WHERE serial_no='$id'");
    if($del_p){
        echo "<script>window.open('view_all_orders.php?msg=Ordered deleted successfully !','_self');</script>";
    }
    else{
        echo"<h1>Something went wrong!</h1>";
    }
?>