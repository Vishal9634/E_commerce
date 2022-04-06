<!DOCTYPE html>

<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Blogging | HaxSantosh</title>
        <!--CDN-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!--File-inclusion-->
        <link rel="stylesheet" href="blogstyle.css" type="text/css">
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>
        <style>
            .affix{top:0;width:100%;z-index: 9999 !important;}
            .affix + .row{padding-top:70px;}
            #logo,#logo a,#logo a:hover{
                color:white;font-weight:bold;font-size:50px;text-decoration: none;
            }
            #social_icon{
                color:white;
                font-size:24px;
                padding-right:10px;
            }
            #social_icon:hover{
                color:red;
            }
            .form-control{
                border:1px solid white;background:#24476b;color:white;
                margin-bottom: ;text-align:left;font-size:20px;border-radius: 0px;padding:22px 5px;
                font-family:serif;
            }
            body{
                background-color:#042547;
            }
            .form-control::placeholder {
                color:white;
                opacity: 1;
                font-size:20px;
                padding-left:10px;
            }
            .nav>li>a{color:white;}
            .nav>li>a:hover{background:linear-gradient(to bottom,white,#24476b);color:#042547;border-radius:100%;animation: font_inc .5s infinite alternate;}
            
           
            @keyframes font_inc{
                0%{transform: rotate(10deg)}
                100%{transform: rotate(-10deg);border-radius: 100%;}
            }
            
        </style>
        
	</head>
<body>
<div class="row" style="background-color:#042547;">
    <div class="container-fluid">
        <div class="col-md-6">
            <font face="Roboto "><h1 id="logo">&nbsp;&nbsp;<a href="index.php">vishal singh</a></h1></font>
        </div>
        <div class="col-md-6">
            <font face="Roboto ">
                <div class="collapse navbar-collapse pull-right" id="sky" style="margin-right:50px;margin-top:20px">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">    <strong>Home</strong>          </a></li>
                            <li><a href="all_products.php">  <strong>All Products</strong>          </a></li>
                            <li><a href="#"><strong>About us</strong>         </a></li>    
                            <li><a href="#"><strong>Help</strong>         </a></li>    
                        </ul>
                    </div>
            
            
            
            </font>
        </div>
        
    </div>
    <br>
</div>
    
<div class="row" style="background-color:#042547;">
    <div class="container">
        <div class="col-md-6">
            <font face="Roboto "><h1 style="color:white;font-weight:bold">Let's Talk</h1></font>
            <font face="Roboto "><p style="color:white;font-size:16px;">Drop us a line and let us know what do you<br>think about our community.</p></font>
            <font face="Roboto "><h2 style="color:white;font-weight:bold">Phone</h2></font>
            <font face="Roboto "><p style="color:white;font-size:16px;">+91 9795937274</p></font>
            <font face="Roboto "><h2 style="color:white;font-weight:bold">Email</h2></font>
            <font face="Roboto "><p style="color:white;font-size:16px;">HaxSantosh@gmail.com</p></font>
            <font face="Roboto "><h2 style="color:white;font-weight:bold">Address</h2></font>
            <font face="Roboto "><p style="color:white;font-size:16px;">Allahabad, Naini- 211010</p></font><br>
            
            <a id="social_icon" href="#"><i class="fa fa-facebook-official"></i></a>
            <a id="social_icon" href="#"><i class="fa fa-linkedin-square"></i></a>
            <a id="social_icon" href="#"><i class="fa fa-twitter-square"></i></a>
            <a id="social_icon" href="#"><i class="fa fa-instagram"></i></a>
            <a id="social_icon" href="#" data-toggle="tooltip" data-placement="bottom" title="+919795937274"><i class="fa fa-whatsapp"></i></a>
            
            
        </div>
        <div class="col-md-6">
            <br><br>
                <form action="contactus.php" method="post">
                <input type="text" class="form-control" name="name" placeholder="Name" ><br>
                <input type="email" class="form-control" name="email" placeholder="Email" style=""><br>
                <input type="text" class="form-control" name="phone" placeholder="Contact No" style=""><br>
                <textarea  class="form-control"  placeholder="Message" name="message" style="height:130px;background:#24476b;margin-bottom: 25px;"></textarea>
                <font face="Roboto "><input type="submit" class="form-control" name="send" value="SEND" style="height:43px;background:white;color:#042547;text-align:center;font-size:22px;padding:7px"><br>
                    </font>
            </form>
            <?php
                if(isset($_POST['send'])){
                    $to="vishalsingh1dec1998@.com";
                    $from=$_POST['email'];
                    $sub=$_POST['name'];
                    $msg=$_POST['message'];
                    $headers = "From: HaxSantosh@gmail.com" . "\r\n" ."CC: HaxSantosh@gmail.com";
                    
                    mail($to,$sub,$msg,$headers);
                    
                }
            
            
            ?>
            
            
        </div>
        <div style="clear:both"></div>
        <br><br><br>
        <div class="row">
            <div class="col-md-12">
            <center><font face="Roboto "><p style="color:white;font-size:18px;">Tell us what's on your mind and we'll get right back to you !</p></font></center>
            </div>
        </div>
    </div>
</div>
</body>
</html>

s