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
    
    .form-control::-webkit-input-placeholder { color: gray; }  /* WebKit, Blink, Edge */
    .form-control:-moz-placeholder { color: black; }  /* Mozilla Firefox 4 to 18 */
    .form-control::-moz-placeholder { color: black; }  /* Mozilla Firefox 19+ */
    .form-control:-ms-input-placeholder { color: black; }  /* Internet Explorer 10-11 */
    .form-control::-ms-input-placeholder { color: black; }  /* Microsoft Edge */    
    
    #ip_element,#pwd1,#pwd2,phone{
        color:;
        background:rgba(255,255,255,1);
        border:none;
        border-radius:5px;
        border-bottom:1px solid silver;
        
    }
    #signup_div{  
        width:400px;
        background-color:rgba(0,0,0,0.1);
        height: auto;
        margin:auto;
        margin-top:2%;
        margin-bottom:5%;
        padding:20px;
        padding-top:10px;
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
    #links_in_signup{
        margin-top:-15px;
        margin-left:-7px;
    }
    #links_in_signup>a>button:hover{text-decoration:none;}
    option{
        background-color:white;
        color:gray;
    }
    #file_label {
        cursor: pointer;
        background:white;
        width:99%;
        height:30px;
        padding:3px;
        padding-left: 10px;
        color:gray;
        font-weight:500;
        border:1px solid silver;
        border-radius:5px;

    }

    #upload-photo {
       opacity: 0;
       position: absolute;
       z-index: -1;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div id="signup_div">    
                <center>
                    <img src="images/user_logo.png" style="height:120px;border-radius:100%;margin-bottom:5px;">
                </center>
                <form class="form-inline" action="c_signup.php" method="post" name="sign_up">
                    <center><p style="color:red" id="form_msg"></p></center>
                    
                    <input id="ip_element" type="text" name="c_name" class="form-control" placeholder="Enter full name" required autofocus style="margin-bottom:10px;width:99%">
                    
                    
                    <input id="ip_element" type="email" name="c_email" class="form-control" placeholder="Enter email eddress" required autofocus style="margin-bottom:10px;width:49%">
                    <input id="phone" type="text" name="c_phone" onchange="phone_validate()" class="form-control" placeholder="Enter contact number" required style="margin-bottom:10px;width:49%">
                    
                    <input id="pwd1" type="password" onchange="password_1();" name="c_password1" class="form-control" placeholder="Enter password" required autofocus style="margin-bottom:10px;width:49%">
                    <input id="pwd2" type="password" onchange="password_2();" name="c_password2" class="form-control" placeholder="Re-type password" required style="margin-bottom:10px;width:49%">
                    <!--
                    <select id="ip_element" name="c_country" class="form-control" onchange="sel_country(this.value);" style="margin-bottom:10px;width:49%">
                        <option value="" selected="selected" disabled="disabled">Select your country</option>
                        <?php
                            /*
                            $run_contries=mysqli_query($con,"SELECT * FROM countries");
                            while($row=mysqli_fetch_array($run_contries)){
                                $country_id=$row['id'];
                                $country_name=$row['name'];
                                echo "
                                    <option value='$country_id'>$country_name</option>
                                ";
                            }
                            */
                        ?>
                    
                    </select>
                    
                    <span id="tmp_data">
                         <select id="ip_element" name="c_state" class="form-control" style="margin-bottom:10px;width:49%">
                            <option value="" selected="selected" disabled="disabled">Select your state</option>
                        </select>
                    </span>    
                    -->
                    <textarea id="ip_element" name="c_address" class="form-control" placeholder="Enter your address" style="margin-bottom:10px;width:99%;height:60px;"></textarea>
                    
                    
                    <div class="checkbox">
                        <label style="opacity:.8;padding-left:10px;"><input type="checkbox" value="remember-me"> Are you agree with our terms and conditions? </label>
                    </div>

                    <button name="c_signup" class="btn btn-lg btn-success btn-block" type="submit" style="margin-top:5px;">Sign Up</button>

                </form><!-- /form -->
                <div id="links_in_login">
                    <a href="checkout.php">
                        <button class="btn btn-link btn-block">Back to Log In?</button>
                    </a>
                </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['c_signup'])){
        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_phone=$_POST['c_phone'];
        $c_password1=$_POST['c_password1'];
        $c_country=$_POST['c_country'];
        //$c_state=$_POST['c_state'];
        //$c_address=$_POST['c_address'];
        
        $reg_qry="INSERT INTO 
        customers(customer_name,customer_email,customer_contact,customer_password,customer_address) VALUES('$c_name','$c_email','$c_phone','$c_password1','$c_address')";
        $run_reg=mysqli_query($con,$reg_qry) or die('Query Execution Error');
        if($reg_qry){
            echo "<script>
                    window.open('index.php?result=You have registered successfully','_self');
                </script>";
                $_SESSION['customer_email']=$c_email;
            
        }else{
            echo "<script>alert('Something went wrong!');</script>";
        }
                    
        
    }
?>
    
    
    
</div>
<!--Footer-------------------------------------------------------------------------------------------------->    
    <?php include_once('includes/footer.php'); ?>
</body>
</html>

<script type="text/javascript">                                                        
    function sel_country(con_value){
            st="country_id="+con_value;
            $.ajax({
                   url: 'states.php',
                   data:st,
                   type:'post',
                   success:function(result){
                       //alert(result);
                       document.getElementById("tmp_data").innerHTML=result;
                   }
               });
        }
</script>
<script type="text/javascript">                                                        
    /*function pic(){
        msg="Profile picture is selected."
        document.getElementById("file_label").innerHTML=msg;
    }*/
</script>

<script>
    function password_2(){
        var p1 = document.forms["sign_up"]["c_password1"].value;
        var p2 = document.forms["sign_up"]["c_password2"].value;
      	var len=p1.length;	

        if (p1!=p2) {
            document.getElementById("form_msg").innerHTML="Those passwords didn't match. Try again.";
            document.getElementById("pwd2").value = "";
            document.getElementById('pwd2').style.border = "1px solid red";
            document.getElementById("pwd2").focus();
        }else{
            document.getElementById("form_msg").innerHTML="";
            document.getElementById('pwd2').style.border = "1px solid silver";
        }
    }
</script>
<script>
    function password_1(){
        var p1 = document.forms["sign_up"]["c_password1"].value;
        var p2 = document.forms["sign_up"]["c_password2"].value;
      	var len=p1.length;	
        
        if(len<6){
        	document.getElementById("form_msg").innerHTML="The password must be at least 6 characters";
            document.getElementById('pwd1').style.border = "1px solid red";
            document.getElementById("pwd1").focus();

        }else{
            document.getElementById("form_msg").innerHTML="";
            document.getElementById('pwd1').style.border = "1px solid silver";
        }
    }
</script>

<script>
$(document).ready(function() {
    $('#phone').blur(function(e) {
        if (validatePhone('phone')) {   
            $('#form_msg').html('');
            $('#phone').css('border', '1px solid silver');
        }
        else {
            $('#form_msg').html('Invalid mobile number!');
            $('#phone').css('border', '1px solid red');
            $('#phone').focus();

        }
    });
});

function validatePhone(phone) {
    var a = document.getElementById(phone).value;
    var filter = /^[0-9-+]+$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}

</script>