<?php
    session_start();
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once('includes/head_items.php'); ?>
</head>
<body>
<!-----------Top-bar--------------------------------->
    <?php include_once('includes/top_bar.php'); ?>
<!--Main-div-header---------------------------------------------------------------------------------------> 
   <?php include_once('includes/nav_bar.php'); ?>
<!--Content-bar-------------------------------------------------------------------------------------------->		
<div class="container-fluid main_div" id="hello" style="padding:20px;">
        
    
<style>
    #login_div{  
        width:300px;
        background-color:rgba(0,0,0,0.1);
        height: auto;
        margin:auto;
        margin-top:5%;
        margin-bottom:5%;
        padding:20px;
        border-radius: 10px;
    }
    .main_div{
            background-image: url('images/bg11.png');
            background-repeat: no-repeat;
            background-size:cover;
    }
    @media only screen and (max-width: 600px) {
        .main_div{
            background:white;
        }

    }
    #links_in_login{
        margin-top:-15px;
        margin-left:-7px;
    }
    #links_in_login>a>button:hover{text-decoration:none;}
    .modal-heder{
        width:400px;
    }
    
    .modal-content{
        margin:auto;
        padding:10px 30px;
        width:500px;
    }
</style>
<?php
/*Redirected for adding product into cart*/
if(isset($_GET['add2cart_request'])){  
    $add2cart_request_id=$_GET['add2cart_request']; 
}else {
    $add2cart_request_id=0;
}
    
/*Redirected by cart*/
if(isset($_GET['request2cart'])){
    $request2cart=$_GET['request2cart']; 
}else{
    $request2cart=0;
}


    
    
?>
<div class="row">
    <div class="col-md-12">
        <div id="login_div">    
                <center>
                    <img src="images/login_logo1.png" style="height:120px;border-radius:100%">
                </center>
                <form class="form-group" action="c_login.php" method="post">
                    <!--------invisible code start------>
                    <input name='add2cart_request_id' value="<?=$add2cart_request_id;?>" style="display:none;">
                    <input name='request2cart' value="<?=$request2cart;?>" style="display:none;">
                    <!--------invisible code ends------>
                    <center><p id="form_msg" style="color:red"></p></center>
                    <label style="color:gray">Email:</label>
                    <input type="email" name="c_email" class="form-control" placeholder="Email address" required autofocus style="margin-bottom:10px;">
                    <label style="color:gray">Password:</label>
                    <input type="password" name="c_password" class="form-control" placeholder="Password" required style="margin-bottom:10px;">

                    <div id="remember" class="checkbox">
                        <label><input type="checkbox" value="remember-me"> Remember me</label>
                    </div>

                    <button name="c_login" class="btn btn-lg btn-primary btn-block" type="submit" style="margin-bottom:10px;">Log In</button>
                    
                </form><!-- /form -->
                <div id="links_in_login">
                    <a href="c_signup.php">
                        <button type="button" class="btn btn-link pull-left" data-toggle="modal" data-target="#signup">New user</button>
                    </a>
                    <a href="forgot_password.php">
                        <button class="btn btn-link">Forgot the password?</button>
                    </a>
                </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['c_login'])){
        $c_email=$_POST['c_email'];
        $c_password=$_POST['c_password'];
        
        $user=mysqli_query($con,"SELECT * FROM customers WHERE customer_email='$c_email' AND customer_password='$c_password'");
        if(mysqli_num_rows($user)>0){
            @session_start();
            $_SESSION['customer_email']=$c_email;
            $cart=mysqli_query($con,"SELECT * FROM cart WHERE added_by='$c_email'");
            
            if(($_POST['add2cart_request_id'])!=0){
                $pro_id=$_POST['add2cart_request_id'];
                echo "<script>window.open('add_to_cart.php?add_cart=$pro_id','_self');</script>";
            }else if(($_POST['request2cart'])==1){
                echo "<script>window.open('cart.php?result=You have logged in successfully','_self');</script>";
            }else if(mysqli_num_rows($cart)==0){ 
                echo "<script>window.open('my_account.php','_self');</script>";
            }else if(mysqli_num_rows($cart)>0){
                echo "<script>window.open('payment_options.php','_self');</script>";
            }else{
                echo "<script>window.open('index.php?result=You hav logged in successfully','_self');</script>";
            }
        }else{
            echo"
                <script>
                    document.getElementById('form_msg').innerHTML='You have entered an incorrect email or password, Please check your login !';
                </script>
            ";
            
        }
        
    }
?>    
    
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
