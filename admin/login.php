<?php include('../includes/connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head_items.php');?>
    <style>
        body{
            background:white;
        }
        #admit_login_box{
            height: auto;
            width: 400px;;
            margin: auto;
            padding-top:140px;   
        }
        .form-control{
            color:#555555;
            background:white;
            text-align: center;
            border:none;
            border-radius:0px;
            border-bottom:1px solid #555555;
            box-shadow:none;
            box-shadow:0px 2px 2px #f8f8f8;;
            font-size:1.5em;
            padding:20px;
            margin-bottom: 20px;
            width:375px;
            
        }
        .btn{
            border-radius:20px 20px;    
            font-size:1.5em;
        }
        
    </style>
</head>

<body>
    <div id="admit_login_box">
        <form action="login.php" method="post">
            <center>
                <img style="width:130px;height:130px;" src="admin_image/login.png">
                <p style="color:red;" id="msg"></p>
                <input onclick="this.form.reset();" name="email" type="email" placeholder="Admin Email" class="form-control" required>  
                <input name="password" type="password" placeholder="Admin Password" class="form-control" required>  
                <button type="submit" name="login" class="btn btn-success btn-block">LOGIN</button>
            </center>
        </form>
    </div>
    
    
    
</body>
</html>
<?php
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $passord=$_POST['password'];
        
        $get_admin=mysqli_query($con,"SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$passord'");
        
        
        if(mysqli_num_rows($get_admin)>0){
            echo "<script>window.open('index.php','_self');</script>";
            session_start();
            $_SESSION['email']=$email;
        }
        else{
            echo "<script>
                document.getElementById('msg').innerHTML='Incorrect email or password';
            </script>";
        }
    }



?>