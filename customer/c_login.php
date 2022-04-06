<?php
	include("includes/db.php");
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
    <div class="row">
        <div class="col-md-12">
            <div id="login_div">    
                    <center><img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" style="height:100px;border-radius:100%"></center>
                    <form class="form-group" action="checkout.php" method="post">
                        <label>Email:</label>
                        <input type="email" class="form-control" placeholder="Email address" required autofocus style="margin-bottom:10px;">
                        <label>Password:</label>
                        <input type="password" class="form-control" placeholder="Password" required style="margin-bottom:10px;">

                        <div id="remember" class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-bottom:10px;">Create a new account</button>

                    </form><!-- /form -->
                    <a href="#" class="forgot-password">
                    Forgot the password?
                    </a>
            </div>
        </div>
    </div>
</div>        
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
