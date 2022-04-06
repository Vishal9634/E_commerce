<?php
    @session_start();
    include("includes/connection.php");
    include("functions/functions.php");
    
    if(isset($_GET['add_cart'])){    
        if(empty($_SESSION['customer_email'])){
            $p_id=$_GET['add_cart'];
            echo "<script>window.open('c_login.php?add2cart_request=$p_id','_self');</script>";
        }else{
                $cEmail=$_SESSION['customer_email'];
                $p_id=$_GET['add_cart'];
                $check_pro_in_cart=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$cEmail' AND p_id='$p_id'");
                if(mysqli_num_rows($check_pro_in_cart)==0){
                    $run_q=mysqli_query($con,"INSERT INTO cart(p_id,added_by,qty) VALUES('$p_id','$cEmail','1')");
                    echo "<script>window.open('index.php?result=Product added into cart successfully','_self');</script>";
                 }else{
                    echo "<script>window.open('index.php?result=already','_self');</script>";
                }
        }
    }




    

?>
