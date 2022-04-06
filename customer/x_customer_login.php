<?php
include_once('includes/connection.php');
include_once('functions/functions.php');


?>
<style>
    #login_div{  
        width:300px;
        background-color:rgba(255,255,255,0.8);
        height: auto;
        margin:auto;
        margin-top:5%;
        margin-bottom:5%;
        padding:20px;
        border-radius: 10px;
    }
    .main_div{
            background-image: url('images/login_bg1.jpg');
            background-repeat: no-repeat;
            background-size:cover;
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

<div class="row">
    <div class="col-md-12">
        <div id="login_div">    
                <center>
                    <img src="images/login_logo1.png" style="height:120px;border-radius:100%">
                </center>
                <form class="form-group" action="checkout.php" method="post">
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
                    <a href="customer_signup.php">
                        <button type="button" class="btn btn-link pull-left" data-toggle="modal" data-target="#signup">New user</button>
                    </a>
                    <a href="#">
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
        
        $login_query="SELECT * FROM customers WHERE customer_email='$c_email' AND customer_password='$c_password'";
        $login_data=mysqli_query($con,$login_query);
        $check_customer=mysqli_num_rows($login_data);
        
        $get_ip=getRealIpAddr();
        $sel_cart="SELECT * FROM cart WHERE ip_add='$get_ip'";
        $cart_data=mysqli_query($con,$sel_cart);
        $check_cart=mysqli_num_rows($cart_data);
        
        if($check_customer==0){
            echo "<script>alert('Incorrect Email or Password!');</script>";
            exit();
        }
        if($check_customer==1 AND $check_cart==0){
            $_SESSION['customer_email']=$c_email;
            echo "<script>window.open('my_account.php','_self');</script>";
        }else{
            $_SESSION['customer_email']=$c_email;
            echo "<script>window.open('payment_options.php','_self');</script>";
        }
        
    }
?>