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
    <div class="row">
        <div class="container">
            <div class="col-md-4">
                <div style="padding-top:30px;padding-bottom:30px;text-align:right;color:#4f4747;font-family:inherit;">
                    <center><img src="images/vishal.jpg" width="200" height="250" class="img-thumbnail img-responsive" ></center>
                    <h3 style="margin-bottom:0;">Vishal Singh</h3>
                    <h4 style="margin-top:0;"><i>-Web Developer</i></h4>
                </div>
            </div>
            <div class="col-md-8">
                <div style="padding-top:20px;padding-bottom:20px;">
                    <h4>Hi, Welcome Guest !</h4>
                    <p style="padding-left:20px;">
                        DEVSHOP is India's largest online shopping website. This website is basically stands for selling electronic products as well as servises also.<br> 
                        Established in the India in May 2018, Opening its first store in Allahabad.<br>
                        There are several types of products, are available in this shop such as Mobile, Laptops, Men's fashion, Books, Software and more products.<br>
                        
                        
                    </p>
                    <h4>Contact Us:</h4>
                    <p style="padding-left:20px;">
                        <strong>Email: </strong>vishalsingh1dec1998@gmail.com<br>
                        <strong>Phone: </strong>+(91) 963-428-5611
                    </p>
                    <h4>Address: </h4>
                    <p style="padding-left:20px;">
                        Allahabad Naini, UPSIDS 211010, in front of UNITED College.<br>
                        Uttar Pradesh, IND
                    </p>
                </div>
            </div>

        </div>
    
    </div>    
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
