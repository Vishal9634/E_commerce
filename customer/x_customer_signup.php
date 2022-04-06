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
</style>

<div class="row">
    <div class="col-md-12">
        <div id="login_div">    
                <center>
                    <img src="images/login_logo1.png" style="height:120px;border-radius:100%">
                </center>
                <form class="form-group" action="checkout.php" method="post">
                    <label style="color:gray">Email:</label>
                    <input type="email" class="form-control" placeholder="Email address" required autofocus style="margin-bottom:10px;">
                    <label style="color:gray">Password:</label>
                    <input type="password" class="form-control" placeholder="Password" required style="margin-bottom:10px;">

                    <div id="remember" class="checkbox">
                        <label><input type="checkbox" value="remember-me"> Remember me</label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-bottom:10px;">Log In</button>

                </form><!-- /form -->
                <div id="links_in_login">
                    <a href="#">
                        <button class="btn btn-link pull-left">New user</button>
                    </a>
                    
                    <a href="#">
                        <button class="btn btn-link">Forgot the password?</button>
                    </a>
                </div>
        </div>
    </div>
</div>
