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
    
   
</style>

<div class="row">
    <div class="col-md-12">
        <div id="login_div">    
                <form class="form-group" action="forgot_password.php" method="post">
                    <table style="width:100%;">
                    <tr>
                        <td colspan="2">
                            <p style="color:gray">Enter your email address, We'll try to send your password to emial.</p>
                            <center><p style="color:red" id="form_msg"></p></center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="email" name="c_email" class="form-control" placeholder="Email your address" style="margin-bottom:10px;" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding:2px;">
                            <button name="send" class="btn btn-success btn-block" type="submit" style="margin-bottom:10px;">Send Me</button>
                        </td>
                        <td style="width:50%; padding:2px;">
                            <a href="c_login.php"><button type="button" class="btn btn-danger btn-block"  style="margin-bottom:10px;">Cancel</button></a>
                        </td>
                    </table>
                </form><!-- /form -->
                
        </div>
    </div>
</div>
<?php
    if(isset($_POST['send'])){
        $c_email=$_POST['c_email'];
        
        $get_customer=mysqli_query($con,"SELECT * FROM customers WHERE customer_email='$c_email'");
        $customer=mysqli_fetch_array($get_customer);
        
        $c_name=$customer['customer_name'];
        $c_email=$customer['customer_email'];
        $c_password=$customer['customer_password'];
        
        if(mysqli_num_rows($get_customer)==0){
            echo "<script>
                document.getElementById('form_msg').innerHTML='This email does not exist, please check your your email.';
            </script>";            
        }
        else{
            $to=$c_email;
            $from='HaxSantosh@gmail.com';
            $subject='Recovery of my password';
            $message="
                <html>
                    <h3>Dear, $c_name</h3>
                    <p>You requested for your password at www.DevShop.com</p>
                    <strong>Your password is: <span style='color:red;'>$c_password</span></strong>
                </html>
            
            ";
            
            mail($to,$subject,$message,$from);
            
            echo "<script>
                document.getElementById('login_div').innerHTML='<center>The password has been sent your email <b>$to</b><br>check your email.</center> ';
            </script>";            
            
            
        }
    }
?>    
    
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
